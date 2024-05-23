<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'code' => fake()->word(),
            'quantity' => 25,
            'min_purchase_amount' => 100,
            'expired_date' => fake()->date(),
            'discount' => '15',
            'discount_type' => 'percent',
            'status' => fake()->boolean()
        ];
    }
}
