<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your ToDo List Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-200">
                <div class="p-8 text-gray-900 space-y-6">
                    <div class="text-xl font-semibold text-gray-800">
                        <b>Your ToDo List Title:</b>
                        <span class="text-gray-700">{{ $todo->title }}</span>
                    </div>
                    <div class="text-xl font-semibold text-gray-800">
                        <b>Your ToDo List Description:</b>
                        <span class="text-gray-700">{{ $todo->description }}</span>
                    </div>

                    <!-- Status Section with Icons -->
                    <div class="flex items-center space-x-2">
                        <span class="text-sm font-medium text-gray-800">Status:</span>
                        <span class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full
                                    {{ $todo->is_completed ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $todo->is_completed ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12' }}"></path>
                            </svg>
                            {{ $todo->is_completed ? 'Completed' : 'In Progress' }}
                        </span>
                    </div>

                    <!-- Navigation Link -->
                    <div class="mt-8 flex justify-start">
                        <a href="{{ route('todos.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition duration-300">Back to Your ToDo List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
