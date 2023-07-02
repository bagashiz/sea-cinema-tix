<?php

namespace Database\Seeders;

use App\Models\Date;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Database\Seeder;

class DateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get all movies
        $movies = Movie::all();

        // get all showtimes
        $showtimes = Showtime::all();

        // get dates from now to a week later
        $startDate = now();
        $endDate = $startDate->copy()->addWeeks();

        while ($startDate->lte($endDate)) {
            $currentDate = $startDate->copy()->format('Y-m-d');

            // create date record
            $date = Date::create([
                'date' => $currentDate,
            ]);

            // attach date to movies
            $date->movies()->attach($movies);

            // attach date to showtimes
            $date->showtimes()->attach($showtimes);

            $startDate->addDay();
        }
    }
}
