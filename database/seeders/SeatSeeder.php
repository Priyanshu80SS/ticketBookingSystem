<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{

    public function run(): void
    {
        Seat::insert([
            ['seat_number' => 'A1', 'seat_type' => 'Single', 'status' => 'Available'],
            ['seat_number' => 'A2', 'seat_type' => 'Double', 'status' => 'Available'],
            ['seat_number' => 'A3', 'seat_type' => 'Single', 'status' => 'Available'],
            ['seat_number' => 'A4', 'seat_type' => 'Double', 'status' => 'Available']

        ]);
    }
}
