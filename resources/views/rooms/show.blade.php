@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Room Details</h2>
    <div class="card">
        <div class="card-header">{{ $room->name }}</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('/assets/images/rooms/'.$room->image) }}" alt="Room Image" style="max-width: 100%; max-height: 300px;">
                </div>
                <div class="col-md-6">
                    <div class="room-details">
                        <div class="room-detail">
                            <p><strong>Max Person:</strong> {{ $room->max_person }}</p>
                        </div>
                        <div class="room-detail">
                            <p><strong>Size:</strong> {{ $room->size }}</p>
                        </div>
                        <div class="room-detail">
                            <p><strong>View:</strong> {{ $room->view }}</p>
                        </div>
                        <div class="room-detail">
                            <p><strong>Number of Beds:</strong> {{ $room->nums_bed }}</p>
                        </div>
                        <div class="room-detail">
                            <p><strong>Hotel:</strong> {{ $room->hotel->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
