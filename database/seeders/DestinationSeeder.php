<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create(['start_destination' => 'Mumbai', 'end_destination' => 'Latur', 'price' => 970]);
        Destination::create(['start_destination' => 'Pune', 'end_destination' => 'Solapur', 'price' => 1600]);
        Destination::create(['start_destination' => 'Mumbai', 'end_destination' => 'Pune', 'price' => 500]);
        Destination::create(['start_destination' => 'Solapur', 'end_destination' => 'Latur', 'price' => 1200]);
    }
}
