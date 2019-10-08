<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                'role_name' => "ADMIN",
                'created_at' => now(),
            ]
        );
        DB::table('roles')->insert(
            [
                'role_name' => "CUSTOMER",
                'created_at' => now(),
            ]
        );

        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert(
            [
                'name' => "admin",
                'email' => "admin@admin.net",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role_id' => "ADMIN",
                'created_at' => now(),
            ]
        );
    }
}