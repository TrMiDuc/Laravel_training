<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold" style="color: #ffffff;">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    @vite(['resources/scss/app.scss'])
    <div class="user-create container">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Add New User</h5>
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">← Back to List</a>
            </div>

            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="card-body">
                    {{-- Full Name --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fname" class="form-label"><strong>First Name:</strong></label>
                            <input type="text" id="fname" name="fname" class="form-control" value="{{ old('fname') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="form-label"><strong>Last Name:</strong></label>
                            <input type="text" id="lname" name="lname" class="form-control" value="{{ old('lname') }}" required>
                        </div>

                        {{-- Username --}}
                        <div class="col-md-6">
                            <label for="username" class="form-label"><strong>Username:</strong></label>
                            <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" required>
                        </div>
                    </div>

                    {{-- Email & Phone --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label"><strong>Email:</strong></label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label"><strong>Phone:</strong></label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>
                    </div>

                    {{-- Location & Role --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="live_at" class="form-label"><strong>Location:</strong></label>
                            <input type="text" id="live_at" name="live_at" class="form-control" value="{{ old('live_at') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="role" class="form-label"><strong>Role:</strong></label>
                            <select id="role" name="role" class="form-select" required>
                                <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label"><strong>Password:</strong></label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label"><strong>Confirm Password:</strong></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Create User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
