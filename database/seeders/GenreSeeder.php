<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a sample genres
        Genre::insert([
            ['name' => 'Action'],
            ['name' => 'Comedy'],
        ]);
    }
}
