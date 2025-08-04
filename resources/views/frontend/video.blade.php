@extends('layouts.frontend.master')

@section('content')
    <div class="mt-[80px] md:mt-[120px]">
        <div class="container mx-auto px-4 sm:px-6 py-8 md:py-12">
            <!-- Video Section Heading -->
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-3 md:mb-4">Featured Video</h2>
                <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto px-2 sm:px-0">Watch our latest content and
                    learn something new today.</p>
            </div>

            <!-- Video Container -->
            <div class="max-w-4xl mx-auto rounded-lg overflow-hidden shadow-md md:shadow-xl">
                <!-- Responsive Video Embed -->
                <div class="aspect-w-16 aspect-h-9 relative" style="padding-bottom: 56.25%;">
                    <iframe class="absolute top-0 left-0 w-full h-full" src="{{ $video->video_path ?? '' }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                    </iframe>
                </div>

                <!-- Video Details -->
                <div class="bg-white p-4 sm:p-6">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-1 sm:mb-2">{{ $video->title ?? '' }}</h3>
                    <p class="text-sm sm:text-base text-gray-700">{{ $video->description ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
