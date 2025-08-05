@extends('layouts.backend.master')

@section('title', 'Feature Details')

@section('content')
<div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-white">Feature Details</h2>
            <p class="text-gray-400">View feature information</p>
        </div>
        <div class="bg-blue-600 p-3 rounded-lg">
            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature->icon_path }}" />
            </svg>
        </div>
    </div>

    <!-- Feature Content -->
    <div class="bg-gray-700 rounded-lg p-6 mb-6">
        <div class="flex flex-col space-y-6">
            <!-- Title Section -->
            <div>
                <h3 class="text-sm font-medium text-gray-400 mb-1">Title</h3>
                <p class="text-xl font-semibold text-white">{{ $feature->title }}</p>
            </div>

            <!-- Description Section -->
            <div>
                <h3 class="text-sm font-medium text-gray-400 mb-1">Description</h3>
                <p class="text-gray-300 whitespace-pre-line">{{ $feature->description }}</p>
            </div>

            <!-- Order Section -->
            <div>
                <h3 class="text-sm font-medium text-gray-400 mb-1">Display Order</h3>
                <span class="inline-block bg-gray-600 text-white rounded-full px-3 py-1 text-sm font-semibold">
                    {{ $feature->order }}
                </span>
                <p class="mt-1 text-sm text-gray-400">Lower numbers appear first</p>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-700">
        <a class="px-6 py-2.5 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition duration-200 flex items-center"
            href="{{ route('admin.features.index') }}">
            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to List
        </a>
        <a class="px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition duration-200 flex items-center"
            href="{{ route('admin.features.edit', $feature->id) }}">
            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </a>
    </div>
</div>
@endsection