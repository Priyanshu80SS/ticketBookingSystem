<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Destination;
use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seats = Seat::all();
        $destinations = Destination::all();

        foreach ($seats as $seat) {
            foreach ($destinations as $destination) {
                Booking::create([
                    'seat_id' => $seat->id,
                    'destination_id' => $destination->id,
                    'seat_type' => $seat->seat_type,
                    'total_price' => $seat->seat_type === 'Single' ? rand(500, 1000) : rand(200, 600), //dynamic price
                    'is_confirmed' => rand(0, 1), //random booking status
                ]);
            }
        }
    }
}
