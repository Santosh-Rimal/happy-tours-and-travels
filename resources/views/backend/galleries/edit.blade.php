@extends('layouts.backend.master')

@section('title', 'Edit Gallery Image')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow p-6 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Edit Gallery Image</h2>

        <form class="space-y-6" action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
                    id="title" type="text" name="title" value="{{ old('title', $gallery->title) }}" required>
                @error('title')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-2" for="image">Image</label>
                @if($gallery->image)
                    <div class="mb-3 flex items-center space-x-4">
                        <img src="{{ asset('storage/'.$gallery->image) }}" class="w-24 h-24 object-cover rounded-md border border-gray-600">
                        <span class="text-gray-300 text-sm">Current Image</span>
                    </div>
                @endif
                <input
                    class="w-full bg-gray-600 text-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="image" type="file" name="image">
                @error('image')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-2" for="caption">Caption</label>
                <input
                    class="w-full bg-gray-600 text-white border @error('caption') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="caption" type="text" name="caption" value="{{ old('caption', $gallery->caption) }}">
                @error('caption')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <a class="px-6 py-2.5 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition duration-200"
                    href="{{ route('admin.galleries.index') }}">
                    Cancel
                </a>
                <button class="px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg flex items-center transition duration-200"
                    type="submit">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Update Image
                </button>
            </div>
        </form>
    </div>
@endsection