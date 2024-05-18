<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'thumbnail_image' => '/uploads/dummy.png',
            'product_category_id' => function () {
                return ProductCategory::all()->random()->id;
            },
            'short_description' => fake()->paragraph(),
            'long_description' => fake()->paragraph(2),
            'price' => fake()->randomFloat(2, 5, 200),
            'offer_price' => fake()->randomFloat(2, 1, 100),
            'sku' => fake()->unique()->ean13(),
            'seo_title' => fake()->sentence(),
            'seo_description' => fake()->paragraph(),
            'status' => fake()->boolean(),
            'show_at_home' => fake()->boolean()
        ];
    }
}
