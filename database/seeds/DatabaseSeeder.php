<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(AttributeOptionSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ChildCategoriesSeeder::class);
    }
}
