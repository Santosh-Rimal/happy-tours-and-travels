@extends('layouts.backend.master')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Edit Feature</h1>
                            <p class="text-blue-100 mt-1">Update feature details</p>
                        </div>
                        <div class="bg-blue-500 p-3 rounded-lg">
                            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Main Form -->
                <form class="px-6 py-8" method="POST" action="{{ route('admin.features.update', $feature->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                            <input
                                class="w-full px-4 py-3 border @error('title') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                type="text" name="title" value="{{ old('title', $feature->title) }}" required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea
                                class="w-full px-4 py-3 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                name="description" rows="4" required>{{ old('description', $feature->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
{{-- 
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Icon Path (SVG)</label>
                            <textarea
                                class="w-full px-4 py-3 border @error('icon_path') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition font-mono text-sm"
                                name="icon_path" rows="6" required>{{ old('icon_path', $feature->icon_path) }}</textarea>
                            @error('icon_path')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <div class="mt-2 flex items-center">
                                <span class="text-sm text-gray-500 mr-2">Preview:</span>
                                {{ $feature->icon_path }}
                            </div>
                        </div> --}}

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                            <input
                                class="w-full px-4 py-3 border @error('order') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                type="number" name="order" value="{{ old('order', $feature->order) }}" min="1"
                                required>
                            @error('order')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-between pt-6 border-t border-gray-200">
                        <a class="px-6 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                            href="{{ route('admin.features.index') }}">
                            Cancel
                        </a>
                        <button
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            type="submit">
                            Update Feature
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        input,
        textarea {
            color: black;
        }
    </style>
@endsection
