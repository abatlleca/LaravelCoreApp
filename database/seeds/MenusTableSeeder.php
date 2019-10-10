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
            'role_name' => 'ADMIN',
        ]);

        factory(Menu::class)->create([
            'name' => 'List',
            'route' => 'menus.index',
            'parent_id' => $m1->id,
            'order' => 0,
            'role_name' => 'ADMIN',
        ]);
        factory(Menu::class)->create([
            'name' => 'Create New',
            'route' => 'menus.create',
            'parent_id' => $m1->id,
            'order' => 1,
            'role_name' => 'ADMIN',
        ]);

        $m2 = factory(Menu::class)->create([
            'name' => 'Roles',
            'route' => '',
            'parent_id' => 0,
            'order' => 1,
            'role_name' => 'ADMIN',
        ]);

        factory(Menu::class)->create([
            'name' => 'List',
            'route' => 'roles.index',
            'parent_id' => $m2->id,
            'order' => 0,
            'role_name' => 'ADMIN',
        ]);

        factory(Menu::class)->create([
            'name' => 'Create New',
            'route' => 'roles.create',
            'parent_id' => $m2->id,
            'order' => 1,
            'role_name' => 'ADMIN',
        ]);

        factory(Menu::class)->create([
            'name' => 'Users',
            'route' => '',
            'parent_id' => 0,
            'order' => 2,
            'role_name' => 'ADMIN',
        ]);

        factory(Menu::class)->create([
            'name' => 'Contact',
            'route' => 'contact',
            'parent_id' => 0,
            'order' => 100,
            'role_name' => 'ALL',
        ]);
    }
}
