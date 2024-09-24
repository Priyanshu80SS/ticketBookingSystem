@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Available Seats for {{ $destination->name }}</h2>

    
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    @if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
    @endif

    <div class="row justify-content-center mb-4">
        <div class="col-md-4">
            <h5>Select a Seat</h5>
            <div id="seat-grid" class="d-flex flex-wrap justify-content-center mb-4">
                @foreach($seats as $seat)
                <div 
                    class="seat {{ $seat->is_booked ? 'booked' : 'available' }} col-3 mb-2 text-center"
                    data-id="{{ $seat->id }}"
                    data-type="{{ $seat->seat_type }}"
                    data-booked="{{ $seat->is_booked }}"
                >
                     {{ $seat->seat_number }} <br>
                    ({{ $seat->seat_type }})
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-6">
            
            <div id="seat-info" class="alert alert-info d-none">
                <p id="seat-details"></p>
                <p id="seat-price"></p>
            </div>

            
            <form id="booking-form" action="{{ route('book-seat') }}" method="POST" class="d-none">
                @csrf
                <input type="hidden" id="seat-id" name="seat_id">
                <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                <input type="hidden" id="seat-type" name="seat_type">

                <button type="submit" class="btn btn-success">Confirm Booking</button>
            </form>
        </div>
    </div>
</div>

<script>
    const seats = document.querySelectorAll('.seat');
    const seatInfo = document.getElementById('seat-info');
    const seatDetails = document.getElementById('seat-details');
    const seatPrice = document.getElementById('seat-price');
    const seatIdInput = document.getElementById('seat-id');
    const seatTypeInput = document.getElementById('seat-type');
    const bookingForm = document.getElementById('booking-form');

    seats.forEach(seat => {
        seat.addEventListener('click', function() {
            // Preventing clicking on booked seats
            if (this.classList.contains('booked')) {
                alert('This seat is already booked.');
                return;
            }

            const seatId = this.dataset.id;
            const seatType = this.dataset.type;
            const seatNumber = this.textContent;

            // Displaying seat info
            seatInfo.classList.remove('d-none');
            seatDetails.textContent = `You have selected ${seatNumber} (${seatType} Seat).`;

            // Calculating price based on seat type
            const basePrice = {{ $destination->price }};
            const finalPrice = seatType === 'Single' ? basePrice * 1.5 : basePrice;
            seatPrice.textContent = `Total Price: ₹${finalPrice}`;

            // Updateing hidden form inputs
            seatIdInput.value = seatId;
            seatTypeInput.value = seatType;

            // Displaying booking form
            bookingForm.classList.remove('d-none');
        });
    });
</script>
@endsection
