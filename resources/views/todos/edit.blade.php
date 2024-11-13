<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ToDoList') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('todos.update', ['todo' => $todo->id]) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <div class="mb-4">
                          <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                          <input type="text" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" value="{{ $todo->title }}">
                        </div>
                        <div class="mb-4">
                          <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                          <textarea name="description" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" cols="5" rows="5">
                            {{ $todo->description }}
                          </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="is_completed" id="" class="form-control">
                                <option disabled selected>Select Option</option>
                                <option value="1">Complated</option>
                                <option value="0">In Complated</option>
                            </select>
                        </div>
                        <x-primary-button>
                            Update
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
