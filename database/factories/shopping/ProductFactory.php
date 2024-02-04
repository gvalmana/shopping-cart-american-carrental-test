<?php

namespace Database\Factories\shopping;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products\Product>
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
            'name' => fake()->name(),
            'code' => fake()->ean8(),
            'price' => fake()->numberBetween(100, 1000),
            'description' => fake()->sentence(),
            'image' => fake()->imageUrl()
        ];
    }
}
