<?php

namespace App\Console\Commands;

use App\Models\Date;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Console\Command;

class SeedDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dates:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed dates table with the date a week after current date';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        // get all movies
        $movies = Movie::all();

        // get all showtimes
        $showtimes = Showtime::all();

        // get date a week later from now
        $weekLater = today('Asia/Jakarta')->addWeeks()->format('Y-m-d');

        // create date record
        $date = Date::create([
            'date' => $weekLater,
        ]);

        // attach date to movies and showtimes
        $date->movies()->attach($movies);
        $date->showtimes()->attach($showtimes);


        $this->info("Date seeded: {$weekLater}");
    }
}
