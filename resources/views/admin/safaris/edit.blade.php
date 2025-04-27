@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4">Edit Safari</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.safaris.update', $safari) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $safari->name) }}">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" required value="{{ old('slug', $safari->slug) }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $safari->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if($safari->image_path)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $safari->image_path) }}" alt="Current Image" style="max-width: 200px; max-height: 120px;" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $safari->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">Featured Safari</label>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.safaris.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
