@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4">Edit Destination</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.destinations.update', $destination) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $destination->name) }}">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" required value="{{ old('slug', $destination->slug) }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $destination->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if($destination->image_path)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $destination->image_path) }}" alt="Current Image" style="max-width: 200px; max-height: 120px;" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_popular" id="is_popular" value="1" {{ old('is_popular', $destination->is_popular) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_popular">Popular Destination</label>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
