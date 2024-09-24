@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Select Your Destination</h2>
    
    <div class="row justify-content-center">
        @foreach($destinations as $destination)
        <div class="col-md-3 p-2">
            <div class="card mb-4 text-center">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h5>{{ $destination->start_destination }}</h5>
                    <h5>{{ $destination->end_destination }}</h5>
                    <p>Price: ₹{{ $destination->price }}</p>
                    <a href="{{ route('seats', $destination->id) }}" class="btn btn-primary">Select Destination</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
