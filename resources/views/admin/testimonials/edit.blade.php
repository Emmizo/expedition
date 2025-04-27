@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Edit Testimonial</h2>
    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="quote" class="form-label">Quote</label>
            <textarea class="form-control" id="quote" name="quote" rows="3" required>{{ old('quote', $testimonial->quote) }}</textarea>
            @error('quote')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $testimonial->author) }}" required>
            @error('author')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
