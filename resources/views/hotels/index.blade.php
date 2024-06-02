@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Hotels</h2>
        <a href="{{ route('hotels.create') }}" class="btn btn-success">Create New Hotel</a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
            <tr>
                <td>{{ $hotel->name }}</td>
                <td>
                    @if($hotel->image)
                        <img src="{{ asset('assets/images/hotels/' . $hotel->image) }}" alt="Hotel Image" style="max-width: 100px;">
                    @else
                        No image
                    @endif
                </td>
                <td>{{ $hotel->description }}</td>
                <td>{{ $hotel->location }}</td>
                <td>
                    <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-info btn-sm mb-1">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $hotels->links() }}
</div>
@endsection
