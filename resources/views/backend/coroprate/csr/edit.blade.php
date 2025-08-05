@extends('layouts.backend.master')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Edit CSR Activity</h1>
            <a href="{{ route('admin.csrs.index') }}" 
               class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 transition duration-200">
                ← Back to all activities
            </a>
        </div>

        <form class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border border-gray-200 dark:border-gray-700" 
              action="{{ route('admin.csrs.update', $csr->id) }}" 
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2" for="title">
                    Title <span class="text-red-500">*</span>
                </label>
                <input
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                    id="title" 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $csr->title) }}" 
                    required
                    placeholder="Enter activity title">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2" for="description">
                    Description <span class="text-red-500">*</span>
                </label>
                <textarea
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                    id="description" 
                    name="description" 
                    rows="5" 
                    required
                    placeholder="Describe the CSR activity">{{ old('description', $csr->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2" for="image">
                    Image
                </label>
                
                @if ($csr->image)
                    <div class="mb-4">
                        <div class="relative group">
                            <img class="h-48 w-full object-cover rounded-lg border border-gray-200 dark:border-gray-600" 
                                 src="{{ $csr->image }}" 
                                 alt="Current CSR Image">
                            <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 rounded-lg">
                                <span class="text-white font-medium">Current Image</span>
                            </div>
                        </div>
                        <div class="flex items-center mt-2">
                            <input type="checkbox" id="remove_image" name="remove_image" class="mr-2">
                            <label for="remove_image" class="text-sm text-gray-600 dark:text-gray-400">Remove current image</label>
                        </div>
                    </div>
                @endif

                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-200">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                <span class="font-semibold">Click to upload</span> or drag and drop
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">JPG, PNG (MAX. 2MB)</p>
                        </div>
                        <input id="dropzone-file" type="file" name="image" class="hidden" />
                    </label>
                </div>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.csrs.index') }}"
                   class="px-6 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300 shadow-md">
                    Update CSR Activity
                </button>
            </div>
        </form>
    </div>

    <script>
        // Display selected file name
        document.getElementById('dropzone-file').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'No file selected';
            const infoText = document.querySelector('#dropzone-file + div p:first-child');
            if (infoText) {
                infoText.textContent = fileName;
            }
        });
    </script>
@endsection