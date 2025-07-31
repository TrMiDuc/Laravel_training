<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold" style="color: #ffffff;">
            {{ __('Users') }}
        </h2>
    </x-slot>

    @vite(['resources/scss/app.scss'])
    <div class="user-page container">
        <div class="user-card card">
            <div class="card-header">
                <h5>User List</h5>
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm add-user-btn">Add New User</a>
            </div>

            <div class="card-body">
                @if($users->isEmpty())
                    <div class="empty-message">No users found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Role</th>
                                    <th>Tasks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>{{ $user->fullname }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone ?? '—' }}</td>
                                        <td>{{ $user->live_at ?? '—' }}</td>
                                        <td>
                                            <span class="badge {{ $user->role === 'admin' ? 'badge-admin' : 'badge-user' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td>{{ $user->tasks->count() }}</td>
                                        <td class="action-buttons">
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-info btn-sm">View</a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
