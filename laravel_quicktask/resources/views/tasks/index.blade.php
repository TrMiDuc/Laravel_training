<x-app-layout>
    @vite(['resources/scss/app.scss'])
    <div class="container">
        <h1 class="mb-4" style="color: white">All Tasks</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
        </div>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Assigned User</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>
                            @if ($task->status === 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif ($task->status === 'completed')
                                <span class="badge bg-success">Completed</span>
                            @else
                                <span class="badge bg-secondary">Unknown</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>
                        <td>
                            @if ($task->user)
                                <a href="{{ route('users.show', $task->user->id) }}">
                                    {{ $task->user->username }}
                                </a>
                            @else
                                <span class="text-muted">Unassigned</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure to delete this task?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No tasks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
