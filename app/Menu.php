<?php

namespace App;

use App\MagicDoor\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasRoles;

    protected $fillable = [
        'parent_id',
        'name',
        'route',
        'icon',
        'order',
        'permission',
        'isActive',
        'environment',
        'role',
        'permission',
    ];

    public $parent;
    public $submenus = [];

    /**
     * Get single menu with all related objects
     * @param $id
     * @return mixed
     */
    public static function getSingleMenu($id){
        $menu = Menu::findOrFail($id);
        $menu->submenus();
        if ($menu->parent_id != 0){
            $menu->parent = Menu::findOrFail($menu->parent_id);
        }
        return $menu;
    }

    /**
     *
     */
    public function submenus(){
        $this->submenus = $this->where('parent_id', $this->id)
            ->orderby('order')
            ->orderby('name')
            ->get();
    }

    /**
     * @return mixed
     */
    public function getParent(){
        return $this->where('id', $this->parent_id)
            ->get()
            ->first();
    }

    /**
     * Get all menus for management
     * @return mixed
     */
    public static function getAllMenus(){
        $allMenus = Menu::where('parent_id', 0)
            ->orderby('order')
            ->orderby('name')
            ->get();
        foreach ($allMenus as $singleMenu){
            $singleMenu->submenus();
        }

        return $allMenus;
    }

    /**
     * Get object array with active menus
     * @return mixed
     */
    public function optionsMenu()
    {
        return $this->where('isActive', 1)
            ->where('environment', session('environment'))
            ->orderby('parent_id')
            ->orderby('order')
            ->orderby('name')
            ->get()
            ->toArray();
    }

    /**
     * Get all active menus to show in Views
     * @return array
     */
    public static function menus()
    {
        $menus = new Menu();
        $menuAll = [];
        if (session()->exists('environment')) {
            $data = $menus->optionsMenu();
            foreach ($data as $line) {
                $item = [array_merge($line, ['submenu' => $menus->getChildren($data, $line)])];
                $menuAll = array_merge($menuAll, $item);
            }
        }
        return $menuAll;
    }

    /**
     * Get submenus for a given menu (array mode)
     * @param $data
     * @param $line
     * @return array
     */
    public function getChildren($data, $line)
    {
        $children = [];
        foreach ($data as $line1) {
            if ($line['id'] == $line1['parent_id']) {
                $children = array_merge($children, [ array_merge($line1, ['submenu' => $this->getChildren($data, $line1) ]) ]);
            }
        }
        return $children;
    }

}
