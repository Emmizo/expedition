@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Edit Service</h2>
    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $service->title) }}" required>
            @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $service->description) }}</textarea>
            @error('description')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="icon_image" class="form-label">Icon Image</label>
            <input type="file" class="form-control" id="icon_image" name="icon_image" accept="image/*">
            @error('icon_image')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        @if(isset($service) && $service->icon_image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $service->icon_image) }}" alt="Icon Image" style="max-width: 60px;">
            </div>
        @endif
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
