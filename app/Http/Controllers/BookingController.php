<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Seat;
use App\Models\Destination;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //to showing available destinations
    public function showDestinations()
    {
        $destinations = Destination::all();
        return view('booking.destinations', compact('destinations'));
    }

    //to showing available seats for a destination
    public function showSeats(Request $request)
    {
        $seats = Seat::where('status', 'Available')->get(); //Fetching only available seats
        $destination = Destination::findOrFail($request->destination_id);

        return view('booking.seats', compact('seats', 'destination'));
    }

    // for booking a seat
    public function bookSeat(Request $request)
    {
        $request->validate([
            'seat_id' => 'required|exists:seats,id',
            'destination_id' => 'required|exists:destinations,id',
            'seat_type' => 'required',
        ]);

        $seat = Seat::findOrFail($request->seat_id);
        $destination = Destination::findOrFail($request->destination_id);

        // Checking if the seat is already booked
        if ($seat->is_booked) {
            return redirect()->back()->withErrors('This seat is already booked.');
        }

        // Calculating price based on seat type
        $total_price = $request->seat_type === 'Single' ? $destination->price * 1.5 : $destination->price;

        // Create booking
        Booking::create([
            'seat_id' => $seat->id,
            'destination_id' => $destination->id,
            'seat_type' => $request->seat_type,
            'total_price' => $total_price,
            'is_confirmed' => true,
        ]);

        // Updating seats status to booked
        $seat->update(['is_booked' => true, 'status' => 'Booked']);

        return redirect()->back()->with('success', 'Seat booked successfully!');
    }
}
