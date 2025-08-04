@extends('layouts.backend.master')

@section('title', 'Image Gallery')

@section('content')
    {{-- Include Alpine.js for auto-hide --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- Success Messages --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-600 text-white rounded-lg shadow" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
            x-show="show" x-transition>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('edit_update'))
        <div class="mb-4 p-4 bg-blue-600 text-white rounded-lg shadow" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
            x-show="show" x-transition>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                {{ session('edit_update') }}
            </div>
        </div>
    @endif

    @if (session('delete'))
        <div class="mb-4 p-4 bg-red-600 text-white rounded-lg shadow" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
            x-show="show" x-transition>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                {{ session('delete') }}
            </div>
        </div>
    @endif

    <div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-6xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <h2 class="text-2xl font-bold text-white">Image Gallery</h2>
            <a href="{{ route('admin.galleries.create') }}" class="flex items-center bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add New Image
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-400 border-b border-gray-700">
                        <th class="py-3 px-4">#</th>
                        <th class="py-3 px-4">Image</th>
                        <th class="py-3 px-4">Title</th>
                        <th class="py-3 px-4">Created At</th>
                        <th class="py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleries as $gallery)
                        <tr class="border-b border-gray-700 hover:bg-gray-700/50 transition duration-150">
                            <td class="py-4 px-4 text-gray-300">{{ $loop->iteration }}</td>
                            <td class="py-4 px-4">
                                <div class="w-16 h-16 rounded-md overflow-hidden border border-gray-600">
                                    <img class="w-full h-full object-cover" src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->title }}">
                                </div>
                            </td>
                            <td class="py-4 px-4 text-white font-medium">{{ $gallery->title }}</td>
                            <td class="py-4 px-4 text-gray-400">{{ $gallery->created_at->format('Y-m-d') }}</td>
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('admin.galleries.show', $gallery) }}" class="text-blue-400 hover:text-blue-300 p-2 rounded-md hover:bg-gray-600 transition" title="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="text-yellow-400 hover:text-yellow-300 p-2 rounded-md hover:bg-gray-600 transition" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this image?')" class="text-red-400 hover:text-red-300 p-2 rounded-md hover:bg-gray-600 transition" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-6 text-center text-gray-400" colspan="5">No images found in the gallery.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $galleries->links() }}
        </div>
    </div>
@endsection