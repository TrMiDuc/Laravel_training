<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold" style="color: #ffffff;">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    @vite(['resources/scss/app.scss'])
    <div class="user-details container">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Profile: {{ $user->fullname }}</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('tasks.create', ['user_id' => $user->id]) }}" class="btn btn-success btn-sm">
                        + Assign Task
                    </a>
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-secondary btn-sm">
                        Edit
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Full Name:</strong>
                        <p>{{ $user->fullname }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Username:</strong>
                        <p>{{ $user->username }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Email:</strong>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Phone:</strong>
                        <p>{{ $user->phone ?? '—' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Location:</strong>
                        <p>{{ $user->live_at ?? '—' }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Role:</strong>
                        <span class="badge {{ $user->role === 'admin' ? 'badge-admin' : 'badge-user' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <strong>Number of Tasks:</strong>
                        <p>{{ $user->tasks->count() }}</p>
                    </div>
                </div>

                @if ($user->tasks->isNotEmpty())
                <hr>
                <h6 class="mb-3">Assigned Tasks</h6>
                <div class="task-list">
                    @foreach ($user->tasks->where('status', '!=', 'completed') as $task)
                    <div class="card mb-2 p-3 bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">{{ $task->title }}</h6>
                                <p class="mb-1">{{ $task->description }}</p>
                                <span
                                    class="badge {{ $task->status === 'done' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </div>

                            <div class="btn-group">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>