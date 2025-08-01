<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @php
        // Example tasks array (mocked data)
        $tasks = [
            ['title' => 'Buy groceries', 'description' => 'Milk, Bread, Eggs, and Cheese'],
            ['title' => 'Finish report', 'description' => 'Complete the monthly sales report for July'],
            ['title' => 'Call plumber', 'description' => 'Fix the leaking faucet in the kitchen'],
        ];
    @endphp

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <div class=" dark:bg-gray-800 shadow rounded-lg p-6">
                    <p class="text-gray-900 dark:text-gray-100">{{ __("You're logged in!") }}</p>
                </div>
            </div>

            {{-- Task Boxes --}}
            <div class="grid md:grid-cols-2 gap-4">
                @forelse ($tasks as $task)
                    <div class="task-card bg-light border rounded shadow-sm p-4 dark:bg-gray-700 dark:border-gray-600">
                        <div class="d-flex justify-between align-items-center mb-2">
                            <h5 class="task-title font-bold text-xl text-gray-800 dark:text-white">
                                {{ $task['title'] }}
                            </h5>
                            <span class="badge bg-primary text-white text-sm px-2 py-1 rounded">
                                New
                            </span>
                        </div>
                        <p class="task-desc text-gray-700 dark:text-gray-200">
                            {{ $task['description'] }}
                        </p>
                        <div class="mt-4">
                            <button class="btn btn-sm btn-outline-success hover:bg-green-500 hover:text-white transition">
                                Mark as Done
                            </button>
                            <button class="btn btn-sm btn-outline-danger hover:bg-red-500 hover:text-white transition ml-2">
                                Delete
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="bg-warning bg-opacity-20 text-yellow-800 p-4 rounded shadow text-center">
                        There is no more task.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
