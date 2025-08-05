@extends('layouts.backend.master')

@section('title', 'Video Gallery')

@section('content')
<div class="bg-gray-900 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-white">Video Gallery</h2>
                <p class="text-gray-400 mt-1">Manage your video content</p>
            </div>
            <a class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-md transition duration-200"
                href="{{ route('admin.Videos.create') }}">
                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Upload New Video
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-600/90 text-white rounded-lg shadow" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition>
                <div class="flex items-center">
                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Video Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($videos as $video)
                <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <!-- Video Embed -->
                    @if ($video->video_path)
                        <div class="aspect-w-16 aspect-h-9 relative" style="padding-bottom: 56.25%;">
                            <div class="absolute inset-0 flex items-center justify-center bg-gray-900">
                                {!! $video->video_path !!}
                            </div>
                        </div>
                    @endif

                    <!-- Video Details -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">{{ $video->title }}</h3>
                        <div class="text-gray-300 mb-6 whitespace-pre-line">
                            {!! nl2br(e($video->description)) !!}
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-3">
                            <a class="flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-500 text-white rounded-md transition duration-200"
                                href="{{ route('admin.Videos.edit', $video->id) }}">
                                <svg class="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.Videos.destroy', $video->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this video?');">
                                @csrf
                                @method('DELETE')
                                <button class="flex items-center px-4 py-2 bg-red-600 hover:bg-red-500 text-white rounded-md transition duration-200"
                                    type="submit">
                                    <svg class="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <svg class="h-16 w-16 mx-auto text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <p class="mt-4 text-gray-400">No videos found. Upload your first video!</p>
                    <a class="mt-6 inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-md transition duration-200"
                        href="{{ route('admin.Videos.create') }}">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Upload Video
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection