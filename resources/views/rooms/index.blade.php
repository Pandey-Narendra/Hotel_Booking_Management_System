@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Rooms</h2>
    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Add Room</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Max Person</th>
                <th>Size</th>
                <th>View</th>
                <th>Number of Beds</th>
                <th>Price</th>
                <th>Hotel</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td><img src="{{ asset('/assets/images/rooms/'.$room->image) }}" alt="Room Image" style="max-width: 100px; max-height: 100px;"></td>
                <td>{{ $room->max_person }}</td>
                <td>{{ $room->size }}</td>
                <td>{{ $room->view }}</td>
                <td>{{ $room->nums_bed }}</td>
                <td>{{ $room->price }}</td>
                <td>{{ $room->hotel->name }}</td>
                <td>
                    <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $rooms->links() }}
</div>
@endsection
