@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $hotel->name }}</h2>
                <div>
                    <img src="{{ asset('/assets/images/hotels/'.$hotel->image) }}" alt="Hotel Image" style="max-width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
                <h2>Hotel Details</h2>
                <p><strong>Description:</strong> {{ $hotel->description }}</p>
                <p><strong>Location:</strong> {{ $hotel->location }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
