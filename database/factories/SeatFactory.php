<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seat>
 */
class SeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // example: A1, B2, C3, D4, E5, F6, G7, H8
        return [
            'seat_number' => fake()->unique()->regexify('[A-H][1-8]'),
        ];
    }
}
