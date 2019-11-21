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
        $m00 = factory(Menu::class)->create([
            'name' => 'Tickets',
            'route' => '',
            'parent_id' => 0,
            'order' => 0,
            'environment' => 'admin-panel',
            'role' => 'ticket',
        ]);

        $m001 = factory(Menu::class)->create([
            'name' => 'Ticket List',
            'route' => 'ad.tickets.index',
            'parent_id' => $m00->id,
            'order' => 0,
            'environment' => 'admin-panel',
            'role' => 'ticket',
            'permission' => 'ticket-list',
        ]);

        $m12 = factory(Menu::class)->create([
            'name' => 'Create Ticket',
            'route' => 'ad.tickets.create',
            'parent_id' => $m00->id,
            'order' => 1,
            'environment' => 'admin-panel',
            'role' => 'ticket',
            'permission' => 'ticket-create',
        ]);

        $m01 = factory(Menu::class)->create([
            'name' => 'Customers',
            'route' => '',
            'parent_id' => 0,
            'order' => 1,
            'environment' => 'admin-panel',
            'role' => 'customer',
        ]);

        $m001 = factory(Menu::class)->create([
            'name' => 'Customers List',
            'route' => 'customers.index',
            'parent_id' => $m01->id,
            'order' => 0,
            'environment' => 'admin-panel',
            'role' => 'customer',
            'permission' => 'customer-list',
        ]);

        $m12 = factory(Menu::class)->create([
            'name' => 'Create Customer',
            'route' => 'customers.create',
            'parent_id' => $m01->id,
            'order' => 1,
            'environment' => 'admin-panel',
            'role' => 'customer',
            'permission' => 'customer-create',
        ]);

        $m02 = factory(Menu::class)->create([
            'name' => 'Configuration',
            'route' => '',
            'parent_id' => 0,
            'order' => 2,
            'environment' => 'admin-panel',
            'role' => 'config',
        ]);

        $m1 = factory(Menu::class)->create([
            'name' => 'Menus',
            'route' => '',
            'parent_id' => $m02->id,
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
            'parent_id' => $m02->id,
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
            'name' => 'Permissions',
            'route' => '',
            'parent_id' => $m02->id,
            'order' => 2,
            'environment' => 'admin-panel',
            'role' => 'permission',
        ]);

        $m31 = factory(Menu::class)->create([
            'name' => 'Permission List',
            'route' => 'permissions.index',
            'parent_id' => $m3->id,
            'order' => 0,
            'environment' => 'admin-panel',
            'role' => 'permission',
            'permission' => 'permission-list',
        ]);

        $m32 = factory(Menu::class)->create([
            'name' => 'Create Permission',
            'route' => 'permissions.create',
            'parent_id' => $m3->id,
            'order' => 1,
            'environment' => 'admin-panel',
            'role' => 'permission',
            'permission' => 'permission-create',
        ]);

        $m4 = factory(Menu::class)->create([
            'name' => 'Users',
            'route' => '',
            'parent_id' => $m02->id,
            'order' => 3,
            'environment' => 'admin-panel',
            'role' => 'user',
        ]);

        $m41 = factory(Menu::class)->create([
            'name' => 'Users List',
            'route' => 'users.index',
            'parent_id' => $m4->id,
            'order' => 0,
            'environment' => 'admin-panel',
            'role' => 'user',
            'permission' => 'user-list',
        ]);

        $m42 = factory(Menu::class)->create([
            'name' => 'Create User',
            'route' => 'register',
            'parent_id' => $m4->id,
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
