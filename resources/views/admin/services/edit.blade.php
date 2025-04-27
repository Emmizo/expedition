@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Edit Service</h2>
    <form method="POST" action="{{ route('admin.services.update', $service) }}">
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
            <label for="icon" class="form-label">Icon (Bootstrap or FontAwesome class)</label>
            <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon', $service->icon) }}">
            <div class="form-text">e.g. <code>bi bi-phone</code> or <code>fa fa-star</code></div>
            @error('icon')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
