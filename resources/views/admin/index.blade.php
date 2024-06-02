@extends("layouts.admin")
@section("content")
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Hotels</h5>
                <p class="card-text">number of hotels: {{ $hotel }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rooms</h5>
                <p class="card-text">number of rooms: {{ $room }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admins</h5>
                <p class="card-text">number of admins: {{ $admin }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
