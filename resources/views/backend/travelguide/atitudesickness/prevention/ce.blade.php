@extends('layouts.backend.master')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8">
                <h1 class="text-2xl font-bold text-white">
                    {{ isset($note) ? 'Edit Prevention' : 'Create Prevention' }}
                </h1>
                <p class="text-blue-100 mt-1">Manage altitude sickness prevention methods</p>
            </div>

            <!-- Form -->
            <form class="p-6" method="POST"
                action="{{ isset($note) ? route('admin.preventions.update', $note) : route('admin.preventions.store') }}">
                @csrf
                @if (isset($note))
                    @method('PUT')
                @endif

                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                        <input
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            type="text" 
                            name="title" 
                            value="{{ old('title', $note->title ?? '') }}"
                            placeholder="e.g., Acclimatization Techniques"
                            required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Text Content -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Prevention Details</label>
                        <textarea
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            name="text" 
                            rows="8"
                            placeholder="Enter detailed prevention methods..."
                            required>{{ old('text', $note->text ?? '') }}</textarea>
                        @error('text')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-between pt-8 mt-8 border-t border-gray-200 dark:border-gray-700">
                    <a class="px-6 py-3 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                        href="{{ route('admin.preventions.index') }}">
                        Cancel
                    </a>
                    <button
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-md"
                        type="submit">
                        {{ isset($note) ? 'Update Prevention' : 'Save Prevention' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection