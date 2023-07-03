<?php

namespace Database\Seeders;

use App\Models\Date;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Database\Seeder;

class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // showtime schedule
        $schedule = [
            ['start' => '10:00', 'end' => '12:00'],
            ['start' => '12:30', 'end' => '14:30'],
            ['start' => '15:00', 'end' => '17:00'],
            ['start' => '17:30', 'end' => '19:30'],
            ['start' => '20:00', 'end' => '22:00'],
        ];

        foreach ($schedule as $time) {
            // create showtime record
            Showtime::create([
                'start_time' => $time['start'],
                'end_time' => $time['end'],
            ]);
        }
    }
}
