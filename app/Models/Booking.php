<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;



    protected $fillable = [
        'seat_id',
        'destination_id',
        'seat_type',
        'total_price',
        'is_confirmed'
    ];

    //relations with Seats
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

    //relations with Destinations
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
