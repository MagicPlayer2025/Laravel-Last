<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 1000, 15000),
            'stock' => $this->faker->numberBetween(0, 50),
            'image_url' => 'https://images.unsplash.com/photo-1509395176047-4a66953fd231?w=800&auto=format&fit=crop',
        ];
    }
}

