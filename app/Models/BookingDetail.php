<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'trip_id',
        'seat_type',
        'trip_prize',
        'seat_prize',
        'total_prize',
    ];
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
    public function seat(){
        return $this->belongsTo(Seat::class);
    }
}
