<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a sample movies
        Movie::insert([
            ['title' => 'The Shawshank Redemption', 'year' => 1994, 'genre_id' => 1],
            ['title' => 'The Godfather', 'year' => 1972, 'genre_id' => 1],
            ['title' => 'Pulp Fiction', 'year' => 1994, 'genre_id' => 2],
            ['title' => 'The Dark Knight', 'year' => 2008, 'genre_id' => 2],
        ]);
    }
}
