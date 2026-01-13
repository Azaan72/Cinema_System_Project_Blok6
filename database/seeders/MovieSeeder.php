<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = [
            [
                'title' => 'Inception',
                'duration' => 148,
                'age_limit' => 13,
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',

            ],
            [
                'title' => 'The Dark Knight',
                'duration' => 152,
                'age_limit' => 13,
                'description' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.',

            ],
            [
                'title' => 'IT Chapter One',
                'duration' => 135,
                'age_limit' => 16,
                'description' => 'In the summer of 1989, a group of bullied kids band together to destroy a shape-shifting monster that is terrorizing their town.',

            ],
        ];
        Movie::insert($films);
    }
}
