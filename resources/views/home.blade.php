@extends('layouts.app')

@section('content')
    
<div class="hero-wrap js-fullheight" style="margin-top: -25px; background-image: url('{{ asset('assets/images/image_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h2 class="subheading">Welcome to Vacation Rental</h2>
                <h1 class="mb-4">Rent an apartment for your vacation</h1>
                <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            @foreach($hotels as $hotel)
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url('{{ asset('/assets/images/hotels//'.$hotel->image) }}');"></div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">{{ $hotel->name }}</h3>
                        <p>{{ $hotel->description }}</p>
                        <p>Location: {{ $hotel->location }}</p>
                        <p><a href="#" class="btn btn-primary">View rooms</a></p>
                    </div>
                </div>      
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Apartment Rooms</h2>
            </div>
        </div>
        <div class="row no-gutters">
            @foreach($rooms as $room)
            <div class="col-lg-6">
                <div class="room-wrap d-md-flex">
                    <a href="{{ route('rooms.show', $room->id) }}" class="img" style="background-image: url('{{ asset('assets/images/rooms/' . $room->image) }}');"></a>
                    <div class="half left-arrow d-flex align-items-center">
                        <div class="text p-4 p-xl-5 text-center">
                            <p class="star mb-0">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </p>
                            <h3 class="mb-3"><a href="{{ route('room.details', $room->id) }}">{{ $room->name }}</a></h3>
                            <ul class="list-accomodation">
                                <li><span>Max:</span> {{ $room->max_person }} Persons</li>
                                <li><span>Size:</span> {{ $room->size }} m²</li>
                                <li><span>View:</span> {{ $room->view }}</li>
                                <li><span>Bed:</span> {{ $room->nums_bed }}</li>
                                <li><span>Price:</span> ${{ $room->price }}</li>
                            </ul>
                            <p class="pt-1"><a href="{{ route('room.details', $room->id) }}" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
