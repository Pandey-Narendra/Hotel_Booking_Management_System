@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Hotel</h2>
    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <img src="{{ asset('/assets/images/hotels/'.$hotel->image) }}" alt="Hotel Image" style="margin-top: 5px; max-width: 400px; max-height: 400px;">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $hotel->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $hotel->location }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
