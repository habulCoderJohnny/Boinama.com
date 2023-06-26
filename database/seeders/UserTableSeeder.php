<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            "name" => "Admin",
            "role_id" => 0,
            "email" => "admin@gmail.com",
            "phone" => 01740404040,
            "status" => 1,
            "password" => bcrypt("123456"),
        ]);
    }
}
