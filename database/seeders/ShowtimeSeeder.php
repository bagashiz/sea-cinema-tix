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
        // get existing movies from database
        $movies = Movie::all();

        // showtime schedule
        $schedule = [
            ['start' => '10:00', 'end' => '12:00'],
            ['start' => '12:30', 'end' => '14:30'],
            ['start' => '15:00', 'end' => '17:00'],
            ['start' => '17:30', 'end' => '19:30'],
            ['start' => '20:00', 'end' => '22:00'],
        ];

        // get dates from database
        $dates = Date::pluck('id');

        foreach ($schedule as $timing) {
            foreach ($dates as $dateId) {
                // create showtime record
                $showtime = Showtime::create([
                    'date_id' => $dateId,
                    'start_time' => $timing['start'],
                    'end_time' => $timing['end'],
                ]);

                // attach showtime to movies
                $showtime->movies()->attach($movies);
            }
        }
    }
}
