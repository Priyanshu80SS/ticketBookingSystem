<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;




    protected $fillable = ['start_destination', 'end_destination', 'price'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
