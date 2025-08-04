@extends('layouts.backend.master')

@section('content')
<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-white">{{ $about->page_title }}</h1>
                        <p class="text-blue-100 mt-1">{{ $about->page_subtitle }}</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.abouts.edit', $about->id) }}"
                            class="flex items-center px-4 py-2 bg-white text-blue-600 rounded-lg hover:bg-blue-50 transition">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <a href="{{ route('admin.abouts.index') }}"
                            class="flex items-center px-4 py-2 bg-white text-gray-600 rounded-lg hover:bg-gray-50 transition">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-8">
                <div class="prose max-w-none">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ $about->page_title }}</h2>
                    <p class="text-xl text-gray-600 mb-8">{{ $about->page_subtitle }}</p>

                    @foreach($about->sections as $section)
                        @if($section['section_type'] === 'content')
                            <div class="mb-8">
                                <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ $section['section_title'] }}</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $section['section_content'] }}</p>
                            </div>
                        @else
                            <div class="bg-blue-50 rounded-lg p-6 mb-8">
                                <div class="text-5xl font-bold text-blue-600">{{ $section['stat_value'] }}</div>
                                <div class="text-lg font-medium text-gray-700 mt-2">{{ $section['stat_label'] }}</div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection