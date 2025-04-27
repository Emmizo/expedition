@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Manage Users</h2>
        <div>
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>
            <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#importUserModal">Import Users</button>
        </div>
                </div>
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff&size=64" class="rounded-circle" width="40" height="40" alt="Avatar">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->getRoleNames() as $role)
                                        <span class="badge bg-info text-dark me-1">{{ $role }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <form method="POST" action="#" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No users found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <div class="mt-3">
        {{ $users->links() }}
</div>

<!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
                <form method="POST" action="#">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Roles</label><br>
                            {{-- Loop roles if available --}}
                            @if(isset($roles) && $roles->count() > 0)
                                @foreach ($roles as $role)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->name }}">
                                        <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            @else
                                <span class="text-muted">No roles available.</span>
                            @endif
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add User</button>
            </div>
                </form>
        </div>
    </div>
</div>

    <!-- Import Users Modal -->
    <div class="modal fade" id="importUserModal" tabindex="-1" aria-labelledby="importUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="importUserModalLabel">Import Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                        <div class="mb-3">
                            <label for="user_import_file" class="form-label">CSV File</label>
                            <input type="file" class="form-control" id="user_import_file" name="user_import_file" required accept=".csv">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Assign Roles to Imported Users</label><br>
                            @if(isset($roles) && $roles->count() > 0)
                                @foreach ($roles as $role)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="import_roles[]" id="import_role_{{ $role->id }}" value="{{ $role->name }}">
                                        <label class="form-check-label" for="import_role_{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            @else
                                <span class="text-muted">No roles available.</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Import Users</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
