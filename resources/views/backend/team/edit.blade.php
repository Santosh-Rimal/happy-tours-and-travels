@extends('layouts.backend.master')

@section('title', 'Edit Team Member')

@section('content')
<div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-white">Edit Team Member</h2>

    <form class="space-y-6" method="POST" action="{{ route('admin.teams.update', $team->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
            <label class="block text-sm font-medium text-white mb-2" for="name">Name</label>
            <input
                class="w-full bg-gray-700 text-white border @error('name') border-red-500 @else border-gray-600 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                id="name" type="text" name="name" value="{{ old('name', $team->name) }}" required>
            @error('name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2" for="position">Position</label>
            <input
                class="w-full bg-gray-700 text-white border @error('position') border-red-500 @else border-gray-600 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                id="position" type="text" name="position" value="{{ old('position', $team->position) }}" required>
            @error('position')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2" for="description">Description</label>
            <textarea
                class="w-full bg-gray-700 text-white border @error('description') border-red-500 @else border-gray-600 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[100px]"
                id="description" name="description" required>{{ old('description', $team->description) }}</textarea>
            @error('description')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Current Image</label>
            <div class="mt-2">
                <img class="h-32 w-32 rounded-lg object-cover border-2 border-gray-600" src="{{ $team->image_url }}"
                    alt="{{ $team->name }}">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2" for="image">New Image (Leave blank to keep current)</label>
            <input
                class="w-full bg-gray-700 text-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                id="image" type="file" name="image" accept="image/*">
            @error('image')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2" for="order">Order</label>
            <input
                class="w-full bg-gray-700 text-white border @error('order') border-red-500 @else border-gray-600 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                id="order" type="number" name="order" value="{{ old('order', $team->order) }}" min="1" required>
            @error('order')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-700">
            <a class="px-6 py-2.5 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition duration-200"
                href="{{ route('admin.teams.index') }}">
                Cancel
            </a>
            <button class="px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg flex items-center transition duration-200"
                type="submit">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Update Member
            </button>
        </div>
    </form>
</div>
@endsection