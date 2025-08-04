@extends('layouts.backend.master')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 py-8 md:py-12">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6">
                {{ isset($video) ? 'Edit Video' : 'Upload New Video' }}</h2>

            <form class="bg-white p-6 rounded-lg shadow-md"
                action="{{ isset($video) ? route('admin.Videos.update', $video->id) : route('admin.Videos.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($video))
                    @method('PUT')
                @endif

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="title">Title *</label>
                    <input
                        class="text-black w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        id="title" type="text" name="title" value="{{ old('title', $video->title ?? '') }}"
                        required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="description">Description</label>
                    <textarea
                        class=" text-black w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        id="description" name="description" rows="3">{{ old('description', $video->description ?? '') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="video">Upload Video File</label>
                    <input
                        class="text-black w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        id="video" type="text" name="video_path" {{ old('video_path', $video->video_path ?? '') }}>
                    @error('video_path')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md mr-2 hover:bg-gray-400"
                        href="{{ route('admin.Videos.index') }}">Cancel</a>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                        type="submit">{{ isset($video) ? 'Update Video' : 'Upload Video' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
