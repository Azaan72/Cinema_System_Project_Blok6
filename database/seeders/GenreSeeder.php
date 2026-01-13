<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = 
        [
            ['name' => 'action'],
            ['name' => 'comedy'],
            ['name' => 'drama'],
            ['name' => 'horror'],
            ['name' => 'science fiction'],
            ['name' => 'romance'],
            ['name' => 'animation'],
            ['name' => 'documentary'],
        ];
        Genre::insert($genres);
    }
}
