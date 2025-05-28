<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'        => $this->faker->words(3, true),
            'price'       => $this->faker->randomFloat(2, 100, 10000),
            'image'       => $this->faker->imageUrl(640, 480, 'products', true),
            'quantity'    => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph,
        ];
    }
}
