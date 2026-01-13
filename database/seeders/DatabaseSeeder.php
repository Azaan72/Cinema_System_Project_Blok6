<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MovieSeeder;
use Database\Seeders\GenreSeeder;
use Database\Seeders\PerformanceSeeder;
use Database\Seeders\HallSeeder;
use Database\Seeders\TicketSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'firstname' => 'Test User',
            'lastname' => 'Example',
            'email' => 'test@example.com',
            'phonenumber' => '0123456789',
            'adress' => 'Voorbeeldstraat 1',
            'zip_code' => '1234 AB',
            'city' => 'Voorbeeldstad',
            'customer_id' => 'K123456',

        ]);

        $this->call([
            GenreSeeder::class,
            HallSeeder::class,
            MovieSeeder::class,
            PerformanceSeeder::class,
            TicketSeeder::class,
        ]);
    }
}
