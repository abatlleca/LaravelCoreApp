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
    ];

    public $parent;
    public $submenus = [];

    public function getSubmenus(){
        return $this->where('parent_id', $this->id)
            ->orderby('order')
            ->orderby('name')
            ->get();
    }

    public function getParent(){
        return $this->where('id', $this->parent_id)
            ->get()
            ->first();
    }

    public static function getSingleMenu($id){
        $menu = Menu::findOrFail($id);
        $menu->submenus = $menu->getSubmenus();
        $menu->parent = $menu->getParent();

        return $menu;
    }

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

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_name', 'role_name');
    }

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
    public function optionsMenu()
    {
        return $this->where('enabled', 1)
            ->orderby('parent_id')
            ->orderby('order')
            ->orderby('name')
            ->get()
            ->toArray();
    }
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


}
