@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Why Choose Us</h1>
    <a href="{{ route('why-choose-us.create') }}" class="btn btn-primary mb-3">Add New</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->icon }}</td>
                    <td>
                        <a href="{{ route('why-choose-us.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('why-choose-us.destroy', $item) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
