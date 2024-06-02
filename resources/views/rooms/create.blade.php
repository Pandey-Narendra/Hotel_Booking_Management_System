@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Create Room</h2>
    <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
        </div>
        <div class="form-group">
            <label for="max_person">Max Person:</label>
            <input type="number" class="form-control" id="max_person" name="max_person" required>
        </div>
        <div class="form-group">
            <label for="size">Size:</label>
            <input type="number" step="0.01" class="form-control" id="size" name="size" required>
        </div>
        <div class="form-group">
            <label for="view">View:</label>
            <input type="text" class="form-control" id="view" name="view" required>
        </div>
        <div class="form-group">
            <label for="nums_bed">Number of Beds:</label>
            <input type="number" class="form-control" id="nums_bed" name="nums_bed" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input ttype="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="hotel_id">Hotel:</label>
            <select class="form-control" id="hotel_id" name="hotel_id" required>
                @foreach($hotels as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection

Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur, explicabo?