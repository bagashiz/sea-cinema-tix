<?php

namespace Database\Seeders;

use App\Models\Date;
use Illuminate\Database\Seeder;

class DateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get dates from now to 2 weeks later
        $startDate = now();
        $endDate = $startDate->copy()->addWeeks(2);

        while ($startDate->lte($endDate)) {
            $currentDate = $startDate->copy()->format('Y-m-d');

            Date::create([
                'date' => $currentDate,
            ]);

            $startDate->addDay();
        }
    }
}
