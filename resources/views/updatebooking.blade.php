@extends('layouts.front')

@section('content')

<h1>Update Your Booking</h1>
<form id="updateBookingForm" method="POST" action="{{ url('/update-booking/' . $booking->id) }}">
   
    @method('PUT') <!-- This indicates that the form will submit a PUT request -->
    
    <!-- Destination Dropdown -->
    <div class="form-group mb-2">
        <label for="destination" class="form-label">Select Destination:</label>
        <select id="destination" name="destination_id" class="form-control" required>
            <option value="">Select Destination</option>
            @foreach($destinations as $destination)
                <option value="{{ $destination->id }}" {{ $destination->id == $booking->destination_id ? 'selected' : '' }}>
                    {{ $destination->destination_name }}
                </option>
            @endforeach
        </select>
    </div>
    
    <!-- Trip Dropdown -->
    <div class="form-group mb-2">
        <label for="trip" class="form-label">Select Trip:</label>
        <select id="trip" name="trip_id" class="form-control" required>
            <option value="">Select Trip</option>
            @foreach($trips as $trip)
                <option value="{{ $trip->id }}" {{ $trip->id == $booking->trip_id ? 'selected' : '' }}>
                    {{ $trip->trip_name }} (₹{{ $trip->prize }})
                </option>
            @endforeach
        </select>
    </div>
    
    <!-- Seat Type Checkboxes -->
    <div class="form-group mb-2">
        <label for="seat" class="form-label">Select Seat Type:</label>
        <div id="seatOptions">
            @foreach (explode(',', $booking->seat_type) as $selectedSeat)
                <div>
                    <input type="checkbox" name="seat_type[]" value="{{ $selectedSeat }}" {{ in_array($selectedSeat, explode(',', $booking->seat_type)) ? 'checked' : '' }}>
                    {{ ucfirst($selectedSeat) }} Seat
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary w-100 py-2">Update Booking</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        // Fetch trips when destination is selected
        $('#destination').change(function() {
            var destinationId = $(this).val();
            if (destinationId) {
                $.get('/get-trips/' + destinationId, function(data) {
                    $('#trip').empty().append('<option value="">Select Trip</option>');
                    $.each(data, function(index, trip) {
                        $('#trip').append('<option value="' + trip.id + '">' + trip.trip_name + ' (₹' + trip.prize + ')</option>');
                    });
                });
            } else {
                $('#trip').empty().append('<option value="">Select Trip</option>');
            }
        });

        // Optionally you can pre-select trip based on existing booking
        $('#trip').val('{{ $booking->trip_id }}').change(); 


        $('#updateBookingForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: $(this).attr('action'), // Get the action URL from the form
                method: 'PUT', // Use PUT method for updating
                data: $(this).serialize(), // Serialize the form data
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function(response) {
                    alert(response.success);
                    window.location.href = '/bookinglist'; // Redirect to booking list
                },
                error: function(xhr) {
                    alert('Something went wrong. Please try again.');
                }
            });
        });

    });



</script>

@endsection
