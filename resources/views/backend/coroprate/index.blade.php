@extends('layouts.backend.master')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 py-8">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Corporate Responsibilities</h2>
                    <a href="{{ route('admin.corporateresponsibilites.create') }}" 
                       class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                        Create New Item
                    </a>
                </div>

                <div class="p-6">
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 dark:bg-green-800 dark:border-green-600 dark:text-green-200">
                            <div class="flex justify-between items-center">
                                <span>{{ session('success') }}</span>
                                <button type="button" class="text-green-700 dark:text-green-200" onclick="this.parentElement.parentElement.style.display='none'">
                                    &times;
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Title</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Description</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($items as $item)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $item->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $item->title }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ Str::limit($item->description, 50) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.corporateresponsibilites.show', $item->id) }}" 
                                                   class="px-3 py-1 bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 rounded-md hover:bg-blue-200 dark:hover:bg-blue-800 transition duration-200">
                                                    Show
                                                </a>
                                                <a href="{{ route('admin.corporateresponsibilites.edit', $item->id) }}" 
                                                   class="px-3 py-1 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 rounded-md hover:bg-green-200 dark:hover:bg-green-800 transition duration-200">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.corporateresponsibilites.destroy', $item->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="px-3 py-1 bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 rounded-md hover:bg-red-200 dark:hover:bg-red-800 transition duration-200"
                                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($items->hasPages())
                        <div class="mt-6">
                            {!! $items->links() !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection