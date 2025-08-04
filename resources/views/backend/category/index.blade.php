@extends('layouts.backend.master')

@section('title', 'All Categories')

@section('content')
    {{-- Include Alpine.js for auto-hide --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- Create Success --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-600 text-white rounded shadow" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
            x-show="show">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Update Success --}}
    @if (session('edit_update'))
        <div class="mb-4 p-4 bg-blue-600 text-white rounded shadow" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
            x-show="show">
            ✏️ {{ session('edit_update') }}
        </div>
    @endif

    {{-- Delete Success --}}
    @if (session('delete'))
        <div class="mb-4 p-4 bg-red-600 text-white rounded shadow" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
            x-show="show">
            🗑️ {{ session('delete') }}
        </div>
    @endif

    <div class="bg-gray-800 rounded-lg shadow p-6 max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Category List</h2>
            <a class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500"
                href="{{ route('admin.categories.create') }}">Add
                New</a>
        </div>

        <table class="w-full text-left text-white">
            <thead>
                <tr class="text-gray-400 border-b border-gray-600">
                    <th class="py-2">#</th>
                    <th class="py-2">Name</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="border-b border-gray-700">
                        <td class="py-2">{{ $loop->iteration }}</td>
                        <td class="py-2">{{ $category->name }}</td>
                        <td class="py-2 space-x-2">
                            <a class="text-blue-400" href="{{ route('admin.categories.show', $category) }}">View</a>
                            <a class="text-yellow-400" href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                            <form class="inline-block" action="{{ route('admin.categories.destroy', $category->id) }}"
                                method="post" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-500 transition"
                                    type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-4 text-center text-gray-400" colspan="3">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-6 flex justify-center">
            {{ $categories->links() }}
            {{-- {{ $categories->links('pagination::tailwind') }} --}}
        </div>
    </div>
@endsection
