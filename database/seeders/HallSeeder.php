<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hall;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zalen =
            [
                ['name' => 'Zaal 1', 'capacity' => 100, 'screen_size' => 'Large'],
                ['name' => 'Zaal 2', 'capacity' => 80, 'screen_size' => 'Medium'],
                ['name' => 'Zaal 3', 'capacity' => 50, 'screen_size' => 'Small'],
                ['name' => 'Zaal 4', 'capacity' => 120, 'screen_size' => 'Large'],
            ];
        Hall::insert($zalen);
    }
}
