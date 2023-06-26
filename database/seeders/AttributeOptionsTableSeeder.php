<?php

use App\Models\AttributeOption;
use Illuminate\Database\Seeder;

class AttributeOptionsTableSeeder extends Seeder
{
    public function run()
    {
        $attributeOptions = [
            [
                'id' => 172,
                'attribute_id' => 24,
                'name' => '40',
                'created_at' => '2019-09-24 01:25:32',
                'updated_at' => '2019-09-24 01:25:32',
            ],
            // Add more attribute options here...

            [
                'id' => 270,
                'attribute_id' => 38,
                'name' => 'Spanish',
                'created_at' => '2021-09-19 12:41:45',
                'updated_at' => '2021-09-19 12:41:45',
            ],
        ];

        foreach ($attributeOptions as $option) {
            AttributeOption::create($option);
        }
    }
}
