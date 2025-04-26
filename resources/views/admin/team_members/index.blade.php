@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Team Members</h2>
        <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">Add New Member</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Title</th>
                            <th>LinkedIn</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teamMembers as $member)
                            <tr>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->title }}</td>
                                <td>@if($member->linkedin_url)<a href="{{ $member->linkedin_url }}" target="_blank">LinkedIn</a>@endif</td>
                                <td>
                                    <a href="{{ route('admin.team-members.edit', $member) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.team-members.destroy', $member) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No team members found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">
        {{ $teamMembers->links() }}
    </div>
</div>
@endsection
