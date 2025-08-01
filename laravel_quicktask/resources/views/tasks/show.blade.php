<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold" style="color: #ffffff;">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    @vite(['resources/scss/app.scss'])

    <div class="container task-details mt-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Task: {{ $task->title }}</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm">← Back to List</a>
                </div>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <strong>Description:</strong>
                    <p>{{ $task->description ?? '—' }}</p>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                        <span class="badge 
                            @if($task->status === 'pending') bg-warning text-dark
                            @elseif($task->status === 'in_progress') bg-info
                            @elseif($task->status === 'completed') bg-success
                            @else bg-secondary
                            @endif">
                            {{ ucfirst($task->status) }}
                        </span>
                    </div>
                    <div class="col-md-4">
                        <strong>Due Date:</strong>
                        <p>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Created At:</strong>
                        <p>{{ $task->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <strong>Assigned User:</strong>
                    @if ($task->user)
                        <a href="{{ route('users.show', $task->user->id) }}">
                            {{ $task->user->fullname }}
                        </a>
                        <br>
                        <small class="text-muted">{{ $task->user->email }}</small>
                    @else
                        <p><span class="text-muted">Unassigned</span></p>
                    @endif
                </div>

                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this task?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete Task</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
