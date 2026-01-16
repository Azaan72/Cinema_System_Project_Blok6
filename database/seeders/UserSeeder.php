<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => 'password123', // plain password
                'phonenumber' => '0612345678',
                'adress' => 'Hoofdstraat 1',
                'zip_code' => '1234AB',
                'city' => 'Amsterdam',
                'customer_id' => 'CUST001',
            ],
            [
                'firstname' => 'Jane',
                'lastname' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => 'secret456', // plain password
                'phonenumber' => '0687654321',
                'adress' => 'Dorpsstraat 5',
                'zip_code' => '5678CD',
                'city' => 'Rotterdam',
                'customer_id' => 'CUST002',
            ],
            [
                'firstname' => 'Alice',
                'lastname' => 'Jansen',
                'email' => 'alice.jansen@example.com',
                'password' => 'mijnwachtwoord', // plain password
                'phonenumber' => '0611122233',
                'adress' => 'Lindelaan 10',
                'zip_code' => '9100XY',
                'city' => 'Utrecht',
                'customer_id' => 'CUST003',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                ...$user,
                'password' => Hash::make($user['password']), // hier hashen
            ]);
        }
    }
}
