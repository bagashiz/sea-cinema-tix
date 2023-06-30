<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get data from provided API endpoint
        $apiEndpoint = 'https://seleksi-sea-2023.vercel.app/api/movies';
        $response = Http::get($apiEndpoint);
        $movies = $response->json();

        // Insert data to database
        foreach ($movies as $movie) {
            Movie::create([
                'title' => $movie['title'],
                'description' => $movie['description'],
                'release_date' => $movie['release_date'],
                'poster_url' => $movie['poster_url'],
                'age_rating' => $movie['age_rating'],
                'ticket_price' => $movie['ticket_price'],
            ]);
        }
    }
}
