@extends('layouts.app')

@section('content')
    <h3 class="text-center">Edit Profile</h3>
    <form action="{{ route('profile.update') }}"
          method="post"
          enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') ? : Auth::user()->name }}"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="Enter your full name"
            >
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') ? : Auth::user()->email }}"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Enter your email"
            >
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                value="{{ old('password') ? : Auth::user()->password }}"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Enter your password"
            >
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="custom-file">
            <input
                type="file"
                name="image"
                id="image"
                class="custom-file-input @error('image') is-invalid @enderror"
            >
            <label for="image" class="custom-file-label">Profile Image</label>
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
