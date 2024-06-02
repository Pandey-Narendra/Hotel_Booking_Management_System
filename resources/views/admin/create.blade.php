@extends("layouts.admin")
@section("content")
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Admins</h5>
                <form method="POST" action="{{ route('admin.create.admin') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="email" name="email" id="form2Example1" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <!-- name input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="name" id="form2Example1" class="form-control @error('name') is-invalid @enderror" placeholder="name" value="{{ old('name') }}" required />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example1" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create</button>
                </form>
                @if(session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
