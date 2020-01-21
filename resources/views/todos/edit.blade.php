@extends('layouts.app')

@section('content')
    <h3 class="text-center">Edit Todo</h3>
    <form action="{{ route('todos.update', $todo->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Todo Title</label>
            <input type="text"
                   name="title"
                   id="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') ? : $todo->title }}"
                   placeholder="Enter Title"
            >
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="body">Todo Description</label>
            <textarea name="body"
                      id="body"
                      rows="4"
                      class="form-control @error('body') is-invalid @enderror">{{ old('body') ? : $todo->body }}</textarea>
            @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
