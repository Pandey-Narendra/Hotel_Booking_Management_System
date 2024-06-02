@extends('layouts.admin')

@section('content')
    <div class="hero-wrap js-fullheight" style="margin-top: -25px; background-image: url('{{ asset('assets/images/image_2.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <h2 class="subheading">Welcome to Vacation Rental</h2>
                    <h1 class="mb-4">{{ $roomDetails->name }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if(session()->has('check_out'))
            <div class="alert alert-success">
                {{ session()->get('check_out') }}
            </div>
        @endif

        @if(session()->has('check_in'))
            <div class="alert alert-success">
                {{ session()->get('check_in') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>
    
    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-4">
                    <form action="{{ route('room.booking', $roomDetails->id) }}" method="POST" class="appointment-form" style="margin-top: -568px;">
                        @csrf
                        <h3 class="mb-3">Book this room</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" value="{{ old('phone_number') }}" required>
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" name="check_in" class="form-control appointment_date-check-in @error('check_in') is-invalid @enderror" placeholder="Check-In" value="{{ old('check_in') }}" required>
                                        @error('check_in')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" name="check_out" class="form-control appointment_date-check-out @error('check_out') is-invalid @enderror" placeholder="Check-Out" value="{{ old('check_out') }}" required>
                                        @error('check_out')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    @if (Auth::check())
                                        <input type="submit" value="Book and Pay Now" class="btn btn-primary py-3 px-4">
                                    @else
                                        <p class="alert alert-success">Please Login To Book</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 wrap-about">
                    <div class="img img-2 mb-4" style="background-image: url('{{ asset('images/image_2.jpg') }}');">
                    </div>
                    <h2>The most recommended vacation rental</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section">
                        <div class="pl-md-5">
                            <h2 class="mb-2">What we offer</h2>
                        </div>
                    </div>
                    <div class="pl-md-5">
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <div class="row">
                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-diet"></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Tea Coffee</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-workout"></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Hot Showers</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-diet-1"></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Laundry</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-first"></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Air Conditioning</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-first"></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Free Wifi</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-first"></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Kitchen</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-first"></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Ironing</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-first"></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Lockers</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>
		
    <section class="ftco-intro" style="background-image: url('{{ asset('images/image_2.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 text-center">
                    <h2>Ready to get started</h2>
                    <p class="mb-4">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with your questions.</p>
                    <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Learn More</a> <a href="#" class="btn btn-white px-4 py-3">Contact us</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("script")
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap Datepicker CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!-- Your date picker script -->
<script>
    $(function() {
        $('.appointment_date-check-in').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('.appointment_date-check-out').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
</script>

@endsection
