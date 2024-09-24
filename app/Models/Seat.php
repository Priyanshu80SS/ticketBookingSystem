<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    use HasFactory;



    protected $fillable = ['seat_number', 'seat_type', 'status'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
