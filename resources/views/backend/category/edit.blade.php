@extends('layouts.backend.master')

@section('title', 'Edit Category')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow p-6 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Edit Category</h2>

        <form class="space-y-6" action="{{ route('admin.categories.update', $category) }}" method="POST">
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

            <div class="mb-6">
                <label class="block text-sm font-medium text-white mb-2" for="name">Category Name</label>
                <input
                    class="w-full bg-gray-600 text-white border @error('name') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="name" type="text" name="name" value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <a class="px-6 py-2.5 bg-gray-600 hover:bg-gray-500 text-white rounded-lg"
                    href="{{ route('admin.categories.index') }}">
                    Cancel
                </a>
                <button class="px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg flex items-center"
                    type="submit">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Category
                </button>
            </div>
        </form>
    </div>
@endsection
