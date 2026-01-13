<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Performance;

class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $voorstellingen = 
        [
            ['datetime' => '2026-02-01 19:00:00', 'hall_id' => 1, 'movie_id' => 1, 'available_seats' => 100],
            ['datetime' => '2026-02-01 21:00:00', 'hall_id' => 2, 'movie_id' => 2, 'available_seats' => 150],
            ['datetime' => '2026-02-02 18:00:00', 'hall_id' => 3, 'movie_id' => 3, 'available_seats' => 80],
            ['datetime' => '2026-02-02 20:30:00', 'hall_id' => 3, 'movie_id' => 3, 'available_seats' => 85],
        ];
        Performance::insert($voorstellingen);
    }
}
