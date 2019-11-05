<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'parent_id',
        'name',
        'route',
        'icon',
        'order',
        'role_name',
        'isActive',
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
        $menu->submenus = $menu->getSubmenus();
        $menu->parent = $menu->getParent();

        return $menu;
    }

    /**
     * @return mixed
     */
    public function getSubmenus(){
        return $this->where('parent_id', $this->id)
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
            $singleMenu->submenus = $singleMenu->getSubmenus();
        }

        return $allMenus;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Role', 'role_name', 'role_name');
    }

    /**
     * Get object array with active menus
     * @return mixed
     */
    public function optionsMenu()
    {
        return $this->where('isActive', 1)
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
        $data = $menus->optionsMenu();
        $menuAll = [];
        foreach ($data as $line) {
            $item = [ array_merge($line, ['submenu' => $menus->getChildren($data, $line) ]) ];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menus->menuAll = $menuAll;
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
