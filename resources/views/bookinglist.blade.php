 @extends('layouts.front')
 @section('content')

<div>
    <a href="{{url('/home')}}" class="add-booking btn btn-success" > Add Booking </a>
</div>

 <h1>Booking Details</h1>

  
     
    <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0">
                  <thead>
                    <tr class="border-2 border-bottom border-primary border-0"> 
                      <th scope="col" class="ps-0">Destination</th>
                    
                      <th scope="col" class="text-center">Trip</th>
                      <th scope="col" class="text-center">Seat Type</th>
                      <th scope="col" class="text-center">trip Prize</th>
                  
                      <th scope="col" class="text-center">Seat Prize (₹)</th>
                      <th scope="col" class="text-center">Total Prize (₹)</th>
                      <th scope="col" class="text-center">Update </th>
                         </tr>
                  </thead>
                  <tbody class="">
                  @foreach($bookings as $booking)
                <tr>
                    <td class="link-primary text-dark fw-medium d-block">{{ $booking->destination->destination_name }}</td>
                    <td class="text-center fw-medium">{{ $booking->trip->trip_name }}</td>
                    <td class="text-center fw-medium"> {{ $booking->seat_type }}</td>
                    <td class="text-center fw-medium">{{ $booking->trip_prize }}</td>
                    <td class="text-center fw-medium">{{ $booking->seat_prize }}</td>
                    <td class="text-center fw-medium">{{ $booking->total_prize }}</td>
                    <th scope="col" class="text-center"><a href="{{ url('/edit-booking/' . $booking->id) }}" class="btn btn-warning"> Update </a></th>
                 
                </tr>
            @endforeach
                   
            </tbody>
            </table>

            @endsection