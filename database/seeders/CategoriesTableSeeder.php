<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'id' => 20,
                'name' => 'ই  বুক',
                'slug' => 'e-book',
                'status' => 1,
                'photo' => null,
                'is_featured' => 0,
                'image' => null,
                'commission' => 0,
                'commission_type' => 'percentage',
            ],
            [
                'id' => 21,
                'name' => 'বই',
                'slug' => 'book',
                'status' => 1,
                'photo' => null,
                'is_featured' => 0,
                'image' => null,
                'commission' => 0,
                'commission_type' => 'percentage',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
