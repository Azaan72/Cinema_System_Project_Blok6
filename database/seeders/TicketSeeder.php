<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets =
            [
                ['price' => 10.00, 'seat' => 'Rij 1A', 'performance_id' => 1],
                ['price' => 12.50, 'seat' => 'Rij 1B', 'performance_id' => 1],
                ['price' => 8.00,  'seat' => 'Rij 2A', 'performance_id' => 2],
                ['price' => 15.00, 'seat' => 'Rij 2B', 'performance_id' => 2],
            ];
        Ticket::insert($tickets);
    }
}
