<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // example: A1, B2, C3, D4, E5, F6, G7, H8
        $alphabet = range('A', 'H');
        $numbers = range(1, 8);

        foreach ($alphabet as $row) {
            foreach ($numbers as $number) {
                Seat::create([
                    'seat_number' => $row . $number,
                ]);
            }
        }
    }
}
