@extends('layouts.backend.master')

@section('title', 'Add New Feature')

@section('content')
<div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-white">Add New Feature</h2>
    <p class="text-gray-400 mb-6">Create a new feature for your website</p>

    <form class="space-y-6" method="POST" action="{{ route('admin.features.store') }}">
        @csrf

        @if ($errors->any())
            <div class="bg-red-800/50 border border-red-600 text-red-100 px-4 py-3 rounded-lg">
                <h4 class="font-semibold mb-2">Please fix these errors:</h4>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label class="block text-sm font-medium text-white mb-2" for="title">Title</label>
            <input
                class="w-full bg-gray-700 text-white border @error('title') border-red-500 @else border-gray-600 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                id="title" type="text" name="title" value="{{ old('title') }}" required>
            @error('title')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2" for="description">Description</label>
            <textarea
                class="w-full bg-gray-700 text-white border @error('description') border-red-500 @else border-gray-600 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[100px]"
                id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2" for="order">Order</label>
            <input
                class="w-full bg-gray-700 text-white border @error('order') border-red-500 @else border-gray-600 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                id="order" type="number" name="order" value="{{ old('order', 1) }}" min="1" required>
            @error('order')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-700">
            <a class="px-6 py-2.5 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition duration-200"
                href="{{ route('admin.features.index') }}">
                Cancel
            </a>
            <button class="px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg flex items-center transition duration-200"
                type="submit">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Save Feature
            </button>
        </div>
    </form>
</div>
@endsection