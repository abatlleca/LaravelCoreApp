<?php

namespace App\Providers;

use App\Http\Controllers\Auth\RegisterController;
use App\MagicDoor\Models\Permission;
use App\MagicDoor\Models\Role;
use App\Menu;
use App\User;

use App\Policies\MenuPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use App\Policies\UsersPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

        Menu::class => MenuPolicy::class,
        User::class => UsersPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
