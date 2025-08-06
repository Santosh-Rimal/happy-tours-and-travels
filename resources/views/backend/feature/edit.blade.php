@extends('layouts.backend.master')

@section('title', 'Edit Feature')

@section('content')
<div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-4xl mx-auto">
    <!-- Header with icon -->
    <div class="flex items-center mb-6">
        <div class="bg-blue-600 p-3 rounded-lg mr-4">
            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-white">Edit Feature</h2>
            <p class="text-gray-400">Update feature details</p>
        </div>
    </div>

    <form class="space-y-6" method="POST" action="{{ route('admin.features.update', $feature->id) }}">
        @csrf
        @method('PUT')

        <!-- Error Display -->
        @if ($errors->any())
            <div class="bg-red-800/50 border border-red-600 text-red-100 px-4 py-3 rounded-lg">
                <div class="flex justify-between items-start">
                    <div>
                        <h4 class="font-semibold mb-2 flex items-center">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Please fix these errors:
                        </h4>
                        <ul class="list-disc pl-7">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-300 hover:text-white">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <!-- Title Field -->
        <div>
            <label class="block text-sm font-medium text-white mb-2" for="title">
                Title <span class="text-red-500">*</span>
            </label>
            <input
                class="w-full bg-gray-700 text-white border border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                id="title" 
                type="text" 
                name="title" 
                value="{{ old('title', $feature->title) }}" 
                placeholder="Enter feature title"
                required>
            @error('title')
                <p class="mt-1 text-sm text-red-400 flex items-center">
                    <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Description Field -->
        <div>
            <label class="block text-sm font-medium text-white mb-2" for="description">
                Description <span class="text-red-500">*</span>
            </label>
            <textarea
                class="w-full bg-gray-700 text-white border border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 min-h-[120px]"
                id="description" 
                name="description" 
                placeholder="Describe the feature in detail"
                required>{{ old('description', $feature->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-400 flex items-center">
                    <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Order Field -->
        <div>
            <label class="block text-sm font-medium text-white mb-2" for="order">
                Display Order <span class="text-red-500">*</span>
            </label>
            <input
                class="w-full bg-gray-700 text-white border border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                id="order" 
                type="number" 
                name="order" 
                value="{{ old('order', $feature->order) }}" 
                min="1"
                placeholder="1"
                required>
            <p class="mt-1 text-sm text-gray-400">Lower numbers appear first</p>
            @error('order')
                <p class="mt-1 text-sm text-red-400 flex items-center">
                    <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Form Actions -->
        <div class="flex justify-between pt-6 border-t border-gray-700">
            <a class="px-6 py-2.5 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition duration-200 flex items-center justify-center"
                href="{{ route('admin.features.index') }}">
                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Cancel
            </a>
            <button 
                class="px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg flex items-center justify-center transition duration-200"
                type="submit">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Update Feature
            </button>
        </div>
    </form>
</div>
@endsection