<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Seat;
class BookingController extends Controller
{
    //
    public function create() {
        // Fetch destinations and available seats from the database
        $destinations = Destination::all();
        $seats = Seat::where('is_booked', false)->get();

        return view('dashboard', compact('destinations', 'seats'));
    }
}
