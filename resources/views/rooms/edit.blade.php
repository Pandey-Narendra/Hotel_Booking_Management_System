@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Room</h2>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $room->name }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="max_person">Max Person:</label>
                    <input type="number" class="form-control @error('max_person') is-invalid @enderror" id="max_person" name="max_person" value="{{ $room->max_person }}" required>
                    @error('max_person')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="size">Size:</label>
                    <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" name="size" value="{{ $room->size }}" required>
                    @error('size')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="view">View:</label>
                    <input type="text" class="form-control @error('view') is-invalid @enderror" id="view" name="view" value="{{ $room->view }}" required>
                    @error('view')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nums_bed">Number of Beds:</label>
                    <input type="number" class="form-control @error('nums_bed') is-invalid @enderror" id="nums_bed" name="nums_bed" value="{{ $room->nums_bed }}" required>
                    @error('nums_bed')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $room->price }}" required>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hotel_id">Hotel:</label>
                    <select class="form-control @error('hotel_id') is-invalid @enderror" id="hotel_id" name="hotel_id" required>
                        @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}" {{ $hotel->id == $room->hotel_id ? 'selected' : '' }}>{{ $hotel->name }}</option>
                        @endforeach
                    </select>
                    @error('hotel_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                    <div class="mt-2" style="max-width: 300px; max-height: 300px; overflow: hidden;">
                        <img src="{{ asset('/assets/images/rooms/'.$room->image) }}" alt="Room Image" style="max-width: 100%; height: auto;">
                    </div>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </div>
    </form>
</div>
@endsection
