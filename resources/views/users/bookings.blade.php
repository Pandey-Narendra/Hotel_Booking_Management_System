@extends('layouts.app')

@section('content')
    
<div class="hero-wrap js-fullheight" style="margin-top: -25px; background-image: url('{{ asset('assets/images/image_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h1>My Bookings</h1>
                <!-- <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
            </div>
        </div>
    </div>
</div>

<div class="container">
        @if ($bookings->isEmpty())
            <p>No bookings found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Days</th>
                        <th>Price</th>
                        <th>Room Name</th>
                        <th>Hotel Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->phone_number }}</td>
                            <td>{{ $booking->check_in }}</td>
                            <td>{{ $booking->check_out }}</td>
                            <td>{{ $booking->days }}</td>
                            <td>{{ $booking->price }}</td>
                            <td>{{ $booking->room_name }}</td>
                            <td>{{ $booking->hotel_name }}</td>
                            <td>{{ $booking->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection