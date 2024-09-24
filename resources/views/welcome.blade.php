@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="mt-5">Welcome to the Bus Ticket Booking System</h1>
    <p class="lead mt-3">Click below to explore available destinations and book your seat.</p>

    <a href="{{ route('destinations') }}" class="btn btn-primary btn-lg mt-4">View Destinations</a>
</div>
@endsection
