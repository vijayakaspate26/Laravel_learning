<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    public function bookings()
    {
        return $this->hasMany(BookingDetail::class, 'destination_id');
    }
}
