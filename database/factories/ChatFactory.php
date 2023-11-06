<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_id' => $this->faker->numberBetween(1, 3),
            'receiver_id' => $this->faker->numberBetween(1, 3),
            'message' => $this->faker->sentence(),
            'is_read' => $this->faker->boolean(),
            'is_edited' => $this->faker->boolean(),
            'is_deleted' => $this->faker->boolean(),
            'deleted_from_sender' => $this->faker->boolean(),
            'deleted_from_receiver' => $this->faker->boolean(),
        ];
    }
}
