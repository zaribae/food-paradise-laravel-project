<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::insert([
            [
                'name' => 'Dessert',
                'slug' => 'dessert',
                'status' => 1,
                'show_at_home' => 1
            ],
            [
                'name' => 'Salad',
                'slug' => 'salad',
                'status' => 1,
                'show_at_home' => 1
            ],
            [
                'name' => 'Appetizer',
                'slug' => 'appetizer',
                'status' => 1,
                'show_at_home' => 1
            ],
            [
                'name' => 'Main Course',
                'slug' => 'main_course',
                'status' => 1,
                'show_at_home' => 1
            ],
            [
                'name' => 'Beverage',
                'slug' => 'beverage',
                'status' => 1,
                'show_at_home' => 1
            ],
        ]);
    }
}
