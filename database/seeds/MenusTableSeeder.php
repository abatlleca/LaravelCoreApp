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
        factory(Menu::class)->create([
            'name' => 'Menus',
            'route' => 'menus',
            'parent_id' => 0,
            'order' => 0,
            'role_name' => 'ADMIN',
        ]);

        factory(Menu::class)->create([
            'name' => 'Roles',
            'route' => 'roles',
            'parent_id' => 0,
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

        factory(Menu::class)->create([
            'name' => 'Profile',
            'route' => '',
            'parent_id' => 0,
            'order' => 101,
            'role_name' => 'ALL',
        ]);

        factory(Menu::class)->create([
            'name' => 'Logout',
            'route' => '',
            'parent_id' => 101,
            'order' => 100,
            'role_name' => 'ALL',
        ]);
    }
}
