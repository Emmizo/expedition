@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                    <h2 class="mb-4 text-center">Edit Slider</h2>
                    <form method="POST" action="{{ route('admin.sliders.update', $slider) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $slider->title) }}" required>
                            @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $slider->description) }}</textarea>
                            @error('description')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            @if($slider->image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $slider->image_path) }}" alt="Slider Image" width="120" class="rounded">
                                </div>
                            @endif
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                            @error('image')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="button_text" class="form-label">Button Text</label>
                            <input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text', $slider->button_text) }}">
                            @error('button_text')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="button_link" class="form-label">Button Link</label>
                            <input type="url" class="form-control" id="button_link" name="button_link" value="{{ old('button_link', $slider->button_link) }}">
                            @error('button_link')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Update Slider</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('admin.sliders.index') }}" class="text-decoration-none">&larr; Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
