@extends('layouts.backend.master')
@section('content')
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit CSR Activity</h1>

        <form class="bg-white p-6 rounded-lg shadow-md" action="{{ route('admin.csrs.update', $csr->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="title">Title</label>
                <input
                    class="text-black w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="title" type="text" name="title" value="{{ old('title', $csr->title) }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="description">Description</label>
                <textarea
                    class="text-black w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="description" name="description" rows="5" required>{{ old('description', $csr->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="image">Image</label>
                @if ($csr->image)
                    <div class="mb-2">
                        <img class="h-32 object-cover" src="{{ $csr->image }}" alt="Current Image">
                        <p class="text-sm text-gray-500 mt-1">Current Image</p>
                    </div>
                @endif
                <input
                    class="text-black w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="image" type="file" name="image">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-md transition duration-300"
                    href="{{ route('admin.csrs.index') }}">Cancel</a>
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition duration-300"
                    type="submit">Update CSR</button>
            </div>
        </form>
    </div>
@endsection
