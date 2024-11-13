<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="sm:flex sm:items-center justify-between p-6 bg-gray-100">
                    <h2 class="text-lg font-medium">Manage Todos</h2>
                    <div class="mt-4 sm:mt-0">
                        <a href="{{ route('todos.create') }}"
                            style="display: inline-flex; align-items: center; padding: 8px 16px; color: white; background-color: #4f46e5; border-radius: 0.375rem; font-weight: bold;"
                            aria-label="Create a new todo item">
                            <span class="material-icons mr-2"> add_circle </span> Create
                        </a>
                    </div>
                </div>

                <div class="p-6 text-gray-900">
                    @if (Session::has('alert-success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif

                    @if(!is_null($todos) && count($todos) > 0)
                        <div class="overflow-hidden border border-gray-300 rounded-lg">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm">
                                        <th class="py-3 px-2 md:px-6 text-left">Title</th>
                                        <th class="py-3 px-2 md:px-6 text-left hidden md:table-cell">Description</th>
                                        <th class="py-3 px-2 md:px-6 text-center">Completed</th>
                                        <th class="py-3 px-2 md:px-6 text-center hidden md:table-cell">Created At</th>
                                        <th class="py-3 px-2 md:px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach ($todos as $todo)
                                        <tr class="hover:bg-gray-100 border-b">
                                            <td class="py-4 px-2 md:px-6">{{ $todo->title }}</td>
                                            <td class="py-4 px-2 md:px-6 hidden md:table-cell">{{ $todo->description }}</td>
                                            <td class="py-4 px-2 md:px-6 text-center">
                                                @if($todo->is_completed)
                                                    <span class="inline-block px-2 md:px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">Completed</span>
                                                @else
                                                    <span class="inline-block px-2 md:px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">Incomplete</span>
                                                @endif
                                            </td>
                                            <td class="py-4 px-2 md:px-6 text-center hidden md:table-cell">{{ $todo->created_at->format('d M, Y') }}</td>
                                            <td class="py-4 px-2 md:px-6 text-center flex md:block justify-center gap-1">
                                                <a href="{{ route('todos.edit', $todo->id) }}"
                                                   class="inline-block px-4 py-1 text-white bg-blue-500 hover:bg-blue-600 rounded text-xs font-semibold">
                                                   Edit
                                                </a>
                                                <a href="{{ route('todos.show', $todo->id) }}"
                                                   class="inline-block px-4 py-1 text-white bg-green-500 hover:bg-green-600 rounded text-xs font-semibold">
                                                   View
                                                </a>
                                                <form method="post" action="{{ route('todos.destroy', $todo->id) }}" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                                    <input
                                                        type="submit"
                                                        class="px-4 py-1 text-white bg-red-500 hover:bg-red-600 rounded text-xs font-semibold"
                                                        value="Delete"
                                                    >

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-6 text-gray-600">
                            <p>No Todos available. Click "Create" to add one.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
