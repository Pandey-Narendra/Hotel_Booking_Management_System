@extends('layouts.app')

@section('content')
    <div class="hero-wrap js-fullheight" style="margin-top: -25px; background-image: url('{{ asset('assets/images/image_2.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <h2 class="subheading">You have successfully booked the room</h2>
                    <p><a href="{{route('home')}}" class="btn btn-primary">Go Home</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection