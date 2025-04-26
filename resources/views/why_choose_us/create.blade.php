@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Why Choose Us Item</h1>
    <form action="{{ route('why-choose-us.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="icon" class="form-label">Icon (FontAwesome class, optional)</label>
            <input type="text" name="icon" id="icon" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('why-choose-us.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
