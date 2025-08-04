<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold" style="color: #ffffff;">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    @vite(['resources/scss/app.scss'])
    <div class="task-edit container">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Task</h5>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm">← Back to List</a>
            </div>

            <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                @csrf
                @method('PUT')

                <div class="card-body">
                    {{-- Title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label"><strong>Title:</strong></label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title', $task->title) }}" required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Description:</strong></label>
                        <textarea id="description" name="description" class="form-control"
                            rows="4">{{ old('description', $task->description) }}</textarea>
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label for="status" class="form-label"><strong>Status:</strong></label>
                        <select id="status" name="status" class="form-select" required>
                            <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>
                                Pending</option>
                            <option value="in_progress"
                                {{ old('status', $task->status) === 'in_progress' ? 'selected' : '' }}>In Progress
                            </option>
                            <option value="completed"
                                {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    {{-- Due Date --}}
                    <div class="mb-3">
                        <label for="due_date" class="form-label"><strong>Due Date:</strong></label>
                        <input type="date" id="due_date" name="due_date" class="form-control"
                            value="{{ old('due_date', $task->due_date->format('Y-m-d')) }}" required>
                    </div>

                    {{-- Assigned User --}}
                    <div class="mb-3">
                        <label for="user_id" class="form-label"><strong>Assign To:</strong></label>
                        <select id="user_id" name="user_id" class="form-select" required>
                            <option value="">-- Select User --</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $task->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->fullname }} ({{ $user->email }})
                            </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Submit Button --}}
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update Task</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>