<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a sample ratings
        Rating::insert([
            ['user_id' => 1, 'movie_id' => 1, 'rating' => 5],
            ['user_id' => 2, 'movie_id' => 1, 'rating' => 4],
            ['user_id' => 3, 'movie_id' => 2, 'rating' => 3],
        ]);
    }
}
