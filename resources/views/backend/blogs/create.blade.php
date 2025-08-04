@extends('layouts.backend.master')

@section('title', 'Create New Blog Post')

@section('content')
<div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-white">Create New Blog Post</h2>

    <form class="space-y-6" action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div class="bg-red-800/50 border border-red-600 text-red-100 px-4 py-3 rounded-lg">
                <h4 class="font-semibold mb-2">Please fix these errors:</h4>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label class="block text-sm font-medium text-white mb-2" for="title">Title</label>
            <input
                class="w-full bg-gray-600 text-white border @error('title') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                id="title" type="text" name="title" value="{{ old('title') }}" required>
            @error('title')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2" for="content">Content</label>
            <textarea
                class="w-full bg-gray-600 text-white border @error('content') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[200px]"
                id="content" name="content" required>{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2" for="image">Featured Image</label>
            <input
                class="w-full bg-gray-600 text-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                id="image" type="file" name="image">
            @error('image')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4 mt-8">
            <a class="px-6 py-2.5 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition duration-200"
                href="{{ route('admin.blogs.index') }}">
                Cancel
            </a>
            <button class="px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg flex items-center transition duration-200"
                type="submit">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create Post
            </button>
        </div>
    </form>
</div>
@endsection