@extends('layouts.backend.master')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 py-8 md:py-12">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">Video Gallery</h2>
            <a class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                href="{{ route('admin.Videos.create') }}">Upload New Video</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($videos as $video)
                <div class="bg-white rounded-lg overflow-hidden shadow-md md:shadow-xl">

                    @if ($video->video_path)
                        <div class="aspect-w-16 aspect-h-9 relative" style="padding-bottom: 56.25%;">
                            {!! $video->video_path !!}
                        </div>
                    @endif

                    <div class="p-6">
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">{{ $video->title }}</h1>
                        <div class="prose max-w-none text-gray-700 mb-6">
                            {!! nl2br(e($video->description)) !!}
                        </div>

                        <div class="flex justify-end space-x-3">
                            <a class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600"
                                href="{{ route('admin.Videos.edit', $video->id) }}">Edit</a>
                            <form action="{{ route('admin.Videos.destroy', $video->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this video?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700"
                                    type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-600">No videos found. Upload your first video!</p>
                    <a class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                        href="{{ route('admin.Videos.create') }}">Upload Video</a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
