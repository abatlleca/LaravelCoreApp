<?php
namespace App\MagicDoor\Models;

use App\MagicDoor\Guard;
use App\MagicDoor\Traits\HasRoles;
use App\MagicDoor\PermissionRegistrar;
use App\MagicDoor\Traits\RefreshesPermissionCache;
use App\MagicDoor\Exceptions\PermissionDoesNotExist;
use App\MagicDoor\Exceptions\PermissionAlreadyExists;
use App\MagicDoor\Contracts\Permission as PermissionContract;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model implements PermissionContract
{
    use HasRoles;
    use RefreshesPermissionCache;
    protected $guarded = ['id'];
    public function __construct(array $attributes = [])
    {
        $attributes['guard_name'] = $attributes['guard_name'] ?? config('auth.defaults.guard');
        parent::__construct($attributes);
        $this->setTable(config('magicdoor.table_names.permissions'));
    }
    public static function create(array $attributes = [])
    {
        $attributes['guard_name'] = $attributes['guard_name'] ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['name' => $attributes['name'], 'guard_name' => $attributes['guard_name']])->first();
        if ($permission) {
            throw PermissionAlreadyExists::create($attributes['name'], $attributes['guard_name']);
        }
        if (isNotLumen() && app()::VERSION < '5.4') {
            return parent::create($attributes);
        }
        return static::query()->create($attributes);
    }
    /**
     * A permission can be applied to roles.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            config('magicdoor.models.role'),
            config('magicdoor.table_names.role_has_permissions'),
            'permission_id',
            'role_id'
        );
    }
    /**
     * A permission belongs to some users of the model associated with its guard.
     */
    public function users(): MorphToMany
    {
        return $this->morphedByMany(
            getModelForGuard($this->attributes['guard_name']),
            'model',
            config('magicdoor.table_names.model_has_permissions'),
            'permission_id',
            config('magicdoor.column_names.model_morph_key')
        );
    }
    /**
     * Find a permission by its name (and optionally guardName).
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @throws App\MagicDoor\Exceptions\PermissionDoesNotExist
     *
     * @return App\MagicDoor\Contracts\Permission
     */
    public static function findByName(string $name, $guardName = null): PermissionContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['name' => $name, 'guard_name' => $guardName])->first();
        if (! $permission) {
            throw PermissionDoesNotExist::create($name, $guardName);
        }
        return $permission;
    }
    /**
     * Find a permission by its id (and optionally guardName).
     *
     * @param int $id
     * @param string|null $guardName
     *
     * @throws App\MagicDoor\Exceptions\PermissionDoesNotExist
     *
     * @return App\MagicDoor\Contracts\Permission
     */
    public static function findById(int $id, $guardName = null): PermissionContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['id' => $id, 'guard_name' => $guardName])->first();
        if (! $permission) {
            throw PermissionDoesNotExist::withId($id, $guardName);
        }
        return $permission;
    }
    /**
     * Find or create permission by its name (and optionally guardName).
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @return App\MagicDoor\Contracts\Permission
     */
    public static function findOrCreate(string $name, $guardName = null): PermissionContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['name' => $name, 'guard_name' => $guardName])->first();
        if (! $permission) {
            return static::query()->create(['name' => $name, 'guard_name' => $guardName]);
        }
        return $permission;
    }

    /**
     * Get the current cached permissions.
     * @param array $params
     * @return Collection
     */
    protected static function getPermissions(array $params = []): Collection
    {
        return app(PermissionRegistrar::class)
            ->setPermissionClass(static::class)
            ->getPermissions($params);
    }
}
