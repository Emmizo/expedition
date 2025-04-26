@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Safaris</h1>
        <a href="{{ route('admin.safaris.create') }}" class="btn btn-primary">Add New Safari</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="GET" class="row g-3 mb-3 align-items-end">
        <div class="col-md-4">
            <label for="search" class="form-label">Search</label>
            <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" placeholder="Name or Slug">
        </div>
        <div class="col-md-3">
            <label for="filter" class="form-label">Filter</label>
            <select name="filter" id="filter" class="form-select">
                <option value="">All</option>
                <option value="featured" {{ request('filter') == 'featured' ? 'selected' : '' }}>Featured</option>
                <option value="not_featured" {{ request('filter') == 'not_featured' ? 'selected' : '' }}>Not Featured</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-primary w-100">Apply</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('admin.safaris.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
        </div>
    </form>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Featured</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($safaris as $safari)
                        <tr>
                            <td>
                                @if($safari->image_path)
                                    <img src="{{ asset('storage/' . $safari->image_path) }}" alt="Safari Image" style="max-width: 80px; max-height: 50px;" class="img-thumbnail">
                                @else
                                    <img src="https://via.placeholder.com/80x50?text=No+Image" alt="No Image" class="img-thumbnail">
                                @endif
                            </td>
                            <td>{{ $safari->name }}</td>
                            <td>{{ $safari->slug }}</td>
                            <td>
                                @if($safari->is_featured)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.safaris.edit', $safari) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.safaris.destroy', $safari) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center">No safaris found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        {{ $safaris->links() }}
    </div>
</div>
@endsection
