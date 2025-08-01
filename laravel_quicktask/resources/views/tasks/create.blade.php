<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold" style="color: #ffffff;">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    @vite(['resources/scss/app.scss'])
    <div class="task-create container">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">New Task</h5>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm">← Back to List</a>
            </div>

            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf

                <div class="card-body">
                    {{-- Title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label"><strong>Title:</strong></label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}"
                            required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Description:</strong></label>
                        <textarea id="description" name="description" class="form-control"
                            rows="4">{{ old('description') }}</textarea>
                    </div>

                    {{-- Due Date --}}
                    <div class="mb-3">
                        <label for="due_date" class="form-label"><strong>Due Date:</strong></label>
                        <input type="date" id="due_date" name="due_date" class="form-control"
                            value="{{ old('due_date') }}" required>
                    </div>

                    {{-- Assigned User --}}
                    <div class="mb-3">
                        <label for="user_id" class="form-label"><strong>Assign To:</strong></label>
                        <select id="user_id" name="user_id" class="form-select" required>
                            <option value="">-- Select User --</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ explode('@', $user->email)[0] }} ({{ $user->email }})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Submit Button --}}
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Create Task</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>