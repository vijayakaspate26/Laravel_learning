<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Trip;
use App\Models\Seat;
use App\Models\BookingDetail;

class TicketController extends Controller
{
    //
     

        // Fetch all destinations for the first dropdown
        public function getDestinations()
        {
            $destinations = Destination::all();
            return response()->json($destinations);
        }
    
        // Fetch trips based on the selected destination
        public function getTrips($destination_id)
        {
            $trips = Trip::where('destination_id', $destination_id)->get();
            return response()->json($trips);
        }
    
        // Fetch seat options (seat types) based on the selected trip
        public function getSeats($trip_id)
        {
            $seats = Seat::all(); // Assuming all seat types are static, if dynamic based on trip_id, modify this.
            return response()->json($seats);
        }


    // Store the selected booking (submit action)
    public function storeBooking(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'trip_id' => 'required|exists:trips,id',
            'seat_type' => 'required|array', // Validate as array
            'seat_type.*' => 'in:single,double', // Ensure valid seat types
        ]);
      
        $trip = Trip::findOrFail($request->trip_id);
        $seat = $trip->seats; // Assuming the trip has one seat record with prices
    
        // Initialize total prize with trip prize
        $total_prize = $trip->prize;
    
        // Calculate the seat prize based on selected seat types
        $seat_prize = 0;
    
        foreach ($request->seat_type as $seat_type) {
            if ($seat_type === 'single') {
                $seat_prize += $seat->single_seat_prize;
            } elseif ($seat_type === 'double') {
                $seat_prize += $seat->double_seat_prize;
            }
        }

$total_prize += $seat_prize;

// Store the booking details in the database
BookingDetail::create([
    'destination_id' => $request->destination_id,
    'trip_id' => $request->trip_id,
    'seat_type' => implode(',', $request->seat_type), // Store as a string
    'trip_prize' => $trip->prize,
    'seat_prize' => $seat_prize,
    'total_prize' => $total_prize,
]);


        // Store booking logic...
        // You can process the seat_type array as needed
        return response()->json(['success' => 'Booking created successfully']);
    }
 //display all the data
    public function showBookings()
{
    $bookings = BookingDetail::with(['destination', 'trip'])->get();
    //  echo "<pre>";
    //  print_r($bookings);
    //  die;

    return view('bookinglist', compact('bookings'));
}


}
