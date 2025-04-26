@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                    <h2 class="mb-4 text-center">Edit Blog Post</h2>
                    <form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                            @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" required>
                            @error('slug')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="2">{{ old('excerpt', $post->excerpt) }}</textarea>
                            @error('excerpt')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea class="form-control" id="body" name="body" rows="6" required>{{ old('body', $post->body) }}</textarea>
                            @error('body')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            @if($post->image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" width="120" class="rounded">
                                </div>
                            @endif
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                            @error('image')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="published_at" class="form-label">Publish Date</label>
                            <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                            @error('published_at')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="destination_id" class="form-label">Destination (optional)</label>
                            <select class="form-select" id="destination_id" name="destination_id">
                                <option value="">-- None --</option>
                                @foreach($destinations as $destination)
                                    <option value="{{ $destination->id }}" @selected(old('destination_id', $post->destination_id) == $destination->id)>{{ $destination->name }}</option>
                                @endforeach
                            </select>
                            @error('destination_id')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Update Post</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('admin.posts.index') }}" class="text-decoration-none">&larr; Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
