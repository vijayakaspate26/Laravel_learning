@extends('layouts.front')


@section('content')

<h1>Book Your Trip</h1>
    <form id="bookingForm" method="POST" >
        <!-- Destination Dropdown -->
        <div class="form-group mb-2">
        <label for="destination " class="form-label">Select Destination:</label>
        <select id="destination" name="destination_id" class="form-control">
            <option value="">Select Destination</option>
        </select>
</div>
        <!-- Trip Dropdown -->
         <div class="form-group mb-2">
         <label for="trip "  class="form-label">Select Trip:</label>
        <select id="trip" name="trip_id" disabled class="form-control">
            <option value="">Select Trip</option>
        </select>
         </div>
       

        <!-- Seat Type Checkboxes -->
         <div class="form-group mb-2">
         <label for="seat "  class="form-label">Select Seat Type:</label>
        <div id="seatOptions" disabled>
            <!-- Seat checkboxes will be dynamically inserted here -->
        </div>
         </div>
       

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4">Submit</button>
    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            // Fetch Destinations
            $.get('/get-destinations', function(data) {
                $('#destination').empty().append('<option value="">Select Destination</option>');
                $.each(data, function(index, destination) {
                    $('#destination').append('<option value="' + destination.id + '">' + destination.destination_name + '</option>');
                });
            });

            // Fetch Trips when destination is selected
            $('#destination').change(function() {
                var destinationId = $(this).val();
                if (destinationId) {
                    $.get('/get-trips/' + destinationId, function(data) {
                        $('#trip').empty().append('<option value="">Select Trip</option>').prop('disabled', false);
                        $.each(data, function(index, trip) {
                            $('#trip').append('<option value="' + trip.id + '">' + trip.trip_name + ' (₹' + trip.prize + ')</option>');
                        });
                    });
                } else {
                    $('#trip').empty().append('<option value="">Select Trip</option>').prop('disabled', true);
                }
            });

            // Fetch Seat Types when trip is selected
            $('#trip').change(function() {
                var tripId = $(this).val();
                if (tripId) {
                    $.get('/get-seats/' + tripId, function(data) {
                        $('#seatOptions').empty().prop('disabled', false); // Clear old options and enable seat section
                        
                        // Add seat options as checkboxes
                        $.each(data, function(index, seat) {
                            $('#seatOptions').append(
                                '<input type="checkbox" name="seat_type[]" value="single"> Single Seat (₹' + seat.single_seat_prize + ')<br>' +
                                '<input type="checkbox" name="seat_type[]" value="double"> Double Seat (₹' + seat.double_seat_prize + ')<br>'
                            );
                        });
                    });
                } else {
                    $('#seatOptions').empty().prop('disabled', true); // Disable seat selection
                }
            });

            // Submit the form via AJAX
            $('#bookingForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/store-booking',
                    method: 'POST',
                    data: $(this).serialize(),
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function(response) {
                        alert(response.success);
                        // Redirect to the booking list page
            window.location.href = '/bookinglist';
                    },
                    error: function(xhr) {
                        alert('Something went wrong. Please try again.');
                    }
                });
            });
        });
    </script>
@endsection

 
</body>
</html>