<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(),
            'description' => fake()->paragraph(),
            'release_date' => fake()->date(),
            'poster_url' => fake()->imageUrl(),
            'age_rating' => fake()->numberBetween(10, 15),
            'ticket_price' => fake()->numberBetween(10000, 50000),
        ];
    }
}
