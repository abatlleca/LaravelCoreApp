<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m1 = factory(Menu::class)->create([
            'name' => 'Menus',
            'route' => '',
            'parent_id' => 0,
            'order' => 0,
            'environment' => 'admin-panel',
            'role' => 'menu'
        ]);

        $m11 = factory(Menu::class)->create([
            'name' => 'Menu List',
            'route' => 'menus.index',
            'parent_id' => $m1->id,
            'order' => 0,
            'environment' => 'admin-panel',
            'role' => 'menu',
            'permission' => 'menu-list',
        ]);

        $m12 = factory(Menu::class)->create([
            'name' => 'Create Menu',
            'route' => 'menus.create',
            'parent_id' => $m1->id,
            'order' => 1,
            'environment' => 'admin-panel',
            'role' => 'menu',
            'permission' => 'menu-create',
        ]);

        $m2 = factory(Menu::class)->create([
            'name' => 'Roles',
            'route' => '',
            'parent_id' => 0,
            'order' => 1,
            'environment' => 'admin-panel',
            'role' => 'role',
        ]);

        $m21 = factory(Menu::class)->create([
            'name' => 'Role List',
            'route' => 'roles.index',
            'parent_id' => $m2->id,
            'order' => 0,
            'environment' => 'admin-panel',
            'role' => 'role',
            'permission' => 'role-list',
        ]);

        $m22 = factory(Menu::class)->create([
            'name' => 'Create Role',
            'route' => 'roles.create',
            'parent_id' => $m2->id,
            'order' => 1,
            'environment' => 'admin-panel',
            'role' => 'role',
            'permission' => 'role-create',
        ]);

        $m3 = factory(Menu::class)->create([
            'name' => 'Users',
            'route' => '',
            'parent_id' => 0,
            'order' => 2,
            'environment' => 'admin-panel',
            'role' => 'user',
        ]);

        $m31 = factory(Menu::class)->create([
            'name' => 'Users List',
            'route' => 'users.index',
            'parent_id' => $m3->id,
            'order' => 0,
            'environment' => 'admin-panel',
            'role' => 'user',
            'permission' => 'user-list',
        ]);

        $m32 = factory(Menu::class)->create([
            'name' => 'Create User',
            'route' => 'register',
            'parent_id' => $m3->id,
            'order' => 1,
            'environment' => 'admin-panel',
            'role' => 'user',
            'permission' => 'user-create',
        ]);

        $mContact = factory(Menu::class)->create([
            'name' => 'Contact',
            'route' => 'contact',
            'parent_id' => 0,
            'order' => 100,
            'environment' => 'customer-panel',
        ]);
    }
}
