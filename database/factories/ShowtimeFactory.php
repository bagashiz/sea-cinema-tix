<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Showtime>
 */
class ShowtimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // show schedule
        $schedule = [
            ['start' => '10:00', 'end' => '12:00'],
            ['start' => '12:30', 'end' => '14:30'],
            ['start' => '15:00', 'end' => '17:00'],
            ['start' => '17:30', 'end' => '19:30'],
            ['start' => '20:00', 'end' => '22:00'],
        ];

        // randomly pick a schedule
        $randomSchedule = $schedule[array_rand($schedule)];
        $startTime = $randomSchedule['start'];
        $endTime = $randomSchedule['end'];

        return [
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}
