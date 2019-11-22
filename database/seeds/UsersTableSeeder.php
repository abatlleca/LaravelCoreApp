<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create a default Super-admin user
        $superadmin = factory(User::class)->create(
            [
                'name' => "super-admin",
                'email' => "superadmin@admin.net",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ]
        );

        $superadmin->assignRole('admin-panel', 'super-admin', 'config', 'user', 'menu', 'role', 'permission', 'customer', 'ticket');
        $superadmin->syncPermissions($superadmin->getPermissionsViaRoles());

        //Create a default admin user
        $admin = factory(User::class)->create(
            [
                'name' => "admin",
                'email' => "admin@admin.net",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ]
        );

        $admin->assignRole('admin-panel', 'config', 'user', 'menu', 'role', 'permission', 'customer', 'ticket');
        $admin->syncPermissions($admin->getPermissionsViaRoles());

        //Create a default customer user
        $customer = factory(User::class)->create(
            [
                'name' => "customer",
                'email' => "customer@admin.net",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ]
        );

        $customer->assignRole('customer-panel', 'customer-ticket');
        $customer->syncPermissions($customer->getPermissionsViaRoles());
    }
}
