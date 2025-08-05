@extends('layouts.backend.master')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 py-8 md:py-12">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">
                {{ isset($video) ? 'Edit Video' : 'Upload New Video' }}
            </h2>

            <form class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md"
                action="{{ isset($video) ? route('admin.Videos.update', $video->id) : route('admin.Videos.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($video))
                    @method('PUT')
                @endif

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2" for="title">Title *</label>
                    <input
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                        id="title" type="text" name="title" value="{{ old('title', $video->title ?? '') }}"
                        required placeholder="Enter video title">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2" for="description">Description</label>
                    <textarea
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                        id="description" name="description" rows="4" placeholder="Enter video description">{{ old('description', $video->description ?? '') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2" for="video_path">
                        {{ isset($video) ? 'Update Video File' : 'Upload Video File' }}
                    </label>
                    @if(isset($video) && $video->video_path)
                        <div class="mb-2">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Current video: {{ basename($video->video_path) }}</span>
                        </div>
                    @endif
                    <input
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                        id="video_path" type="file" name="video_path" accept="video/*">
                    @error('video_path')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3">
                    <a class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-400 dark:hover:bg-gray-500 transition duration-200"
                        href="{{ route('admin.Videos.index') }}">
                        Cancel
                    </a>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200"
                        type="submit">
                        {{ isset($video) ? 'Update Video' : 'Upload Video' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection