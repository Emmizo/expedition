@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Destinations</h1>
        <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary">Add New Destination</a>
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
                <option value="popular" {{ request('filter') == 'popular' ? 'selected' : '' }}>Popular</option>
                <option value="not_popular" {{ request('filter') == 'not_popular' ? 'selected' : '' }}>Not Popular</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-primary w-100">Apply</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('admin.destinations.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
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
                        <th>Popular</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($destinations as $destination)
                        <tr>
                            <td>
                                @if($destination->image_path)
                                    <img src="{{ asset('storage/' . $destination->image_path) }}" alt="Destination Image" style="max-width: 80px; max-height: 50px;" class="img-thumbnail">
                                @else
                                    <img src="https://via.placeholder.com/80x50?text=No+Image" alt="No Image" class="img-thumbnail">
                                @endif
                            </td>
                            <td>{{ $destination->name }}</td>
                            <td>{{ $destination->slug }}</td>
                            <td>
                                @if($destination->is_popular)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.destinations.edit', $destination) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.destinations.destroy', $destination) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">No destinations found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        {{ $destinations->links() }}
    </div>
</div>
@endsection
