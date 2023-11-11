<?php

namespace Database\Factories;

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
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(1000, 9999999),
            'category_id' => $this->faker->numberBetween(1, 3),
            'type_id' => $this->faker->numberBetween(1, 3),
            'image' => 'product.png',
            'stock' => $this->faker->numberBetween(101, 10000),
            'condition' => $this->faker->word,
            'shortname' => $this->faker->word,
            'sold' => $this->faker->numberBetween(1, 100),
        ];
    }
}
