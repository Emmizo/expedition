@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Add New Team Member</h2>
    <form method="POST" action="{{ route('admin.team-members.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control" id="bio" name="bio" rows="3">{{ old('bio') }}</textarea>
            @error('bio')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="image_path" class="form-label">Photo</label>
            <input type="file" class="form-control" id="image_path" name="image_path" accept="image/*">
            @error('image_path')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="linkedin_url" class="form-label">LinkedIn URL</label>
            <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url') }}">
            @error('linkedin_url')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection
