@extends('layouts.app')

@section('content')

    <div class="hero-wrap js-fullheight" style="margin-top: -25px; background-image: url('{{ asset('assets/images/image_2.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <h2 class="subheading">Pay with PayPal</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">  
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script src="https://www.paypal.com/sdk/js?client-id=AWP5QJhV8DGx4vwK4wVxDRlTJ7Brb7UkKzRZ1WGXATV5T7dZNQJhunJNjJjc_gCk-Djs_XZbkiaZbjhF&currency=USD"></script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
            // Define a JavaScript variable and assign the value of 'price'
            var totalPrice = {{ Session::get('price') }};

            // Use the variable in your PayPal button configuration
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: "100" // Use the JavaScript variable here
                            }
                        }]
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {
                        window.location.href = '{{ route('room.booking.success') }}'; // Redirect to success page
                    });
                }
            }).render('#paypal-button-container');
        </script>

    </div>

@endsection
