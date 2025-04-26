@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Setting</h1>
    <form action="{{ route('settings.update', $setting) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="key" class="form-label">Key</label>
            <input type="text" name="key" id="key" class="form-control" value="{{ $setting->key }}" readonly>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <input type="text" name="value" id="value" class="form-control" value="{{ old('value', $setting->value) }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('settings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
