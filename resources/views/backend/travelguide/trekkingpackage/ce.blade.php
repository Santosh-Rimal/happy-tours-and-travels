@extends('layouts.backend.master')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-white">
                            @isset($trekking)
                                Edit Trekking Package
                            @else
                                Add New Trekking Package
                            @endisset
                        </h1>
                        <p class="text-blue-100 mt-1">Manage package details</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form class="p-6" method="POST"
                action="@isset($trekking) {{ route('admin.trekkings.update', $trekking->id) }} @else {{ route('admin.trekkings.store') }} @endisset"
                enctype="multipart/form-data">
                @csrf
                @isset($trekking)
                    @method('PUT')
                @endisset

                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                        <input
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            type="text" 
                            name="title" 
                            required
                            value="{{ old('title', $trekking->title ?? '') }}"
                            placeholder="e.g., Everest Base Camp Trek">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                        <textarea
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            name="description" 
                            rows="4"
                            placeholder="Package description">{{ old('description', $trekking->description ?? '') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Featured Image</label>
                        @isset($trekking->image)
                            <div class="mb-4">
                                <div class="relative group">
                                    <img class="h-48 w-full object-cover rounded-lg border border-gray-200 dark:border-gray-600" 
                                         src="{{ $trekking->image }}" 
                                         alt="Current Package Image">
                                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 rounded-lg">
                                        <span class="text-white font-medium">Current Image</span>
                                    </div>
                                </div>
                                <div class="flex items-center mt-2">
                                    <input type="checkbox" id="remove_image" name="remove_image" class="mr-2">
                                    <label for="remove_image" class="text-sm text-gray-600 dark:text-gray-400">Remove current image</label>
                                </div>
                            </div>
                        @endisset
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-200">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">JPG, PNG (MAX. 2MB)</p>
                                </div>
                                <input id="dropzone-file" type="file" name="image" class="hidden" />
                            </label>
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Requirements -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Requirements</label>
                        <div class="space-y-3" id="requirements-container">
                            @foreach (old('requirements', $trekking->requirements ?? ['']) as $index => $requirement)
                                <div class="requirement-item flex space-x-3">
                                    <input
                                        class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                                        type="text" 
                                        name="requirements[{{ $index }}]"
                                        placeholder="Requirement (e.g., Valid passport)" 
                                        required
                                        value="{{ $requirement }}">
                                    <button
                                        class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 rounded-md hover:bg-red-200 dark:hover:bg-red-800 transition"
                                        type="button" 
                                        onclick="removeItem(this, 'requirements-container')">
                                        Remove
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button 
                            class="mt-2 px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-md hover:bg-blue-200 dark:hover:bg-blue-800 transition"
                            type="button" 
                            onclick="addItem('requirements-container', 'requirements')">
                            Add Requirement
                        </button>
                        @error('requirements')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tips -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tips & Advice</label>
                        <div class="space-y-3" id="tips-container">
                            @foreach (old('tips', $trekking->tips ?? ['']) as $index => $tip)
                                <div class="tip-item flex space-x-3">
                                    <input
                                        class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                                        type="text" 
                                        name="tips[{{ $index }}]"
                                        placeholder="Tip (e.g., Bring warm clothing)" 
                                        required
                                        value="{{ $tip }}">
                                    <button
                                        class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 rounded-md hover:bg-red-200 dark:hover:bg-red-800 transition"
                                        type="button" 
                                        onclick="removeItem(this, 'tips-container')">
                                        Remove
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button 
                            class="mt-2 px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-md hover:bg-blue-200 dark:hover:bg-blue-800 transition"
                            type="button" 
                            onclick="addItem('tips-container', 'tips')">
                            Add Tip
                        </button>
                        @error('tips')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-between pt-8 mt-8 border-t border-gray-200 dark:border-gray-700">
                    <a class="px-6 py-3 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                        href="{{ route('admin.trekkings.index') }}">
                        Cancel
                    </a>
                    <button
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-md"
                        type="submit">
                        @isset($trekking)
                            Update Package
                        @else
                            Add Package
                        @endisset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Display selected file name
    document.getElementById('dropzone-file')?.addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'No file selected';
        const infoText = document.querySelector('#dropzone-file + div p:first-child');
        if (infoText) {
            infoText.textContent = fileName;
        }
    });

    // Generic functions for requirements and tips
    function addItem(containerId, fieldName) {
        const container = document.getElementById(containerId);
        const index = container.querySelectorAll(`.${fieldName}-item`).length;

        const html = `
            <div class="${fieldName}-item flex space-x-3">
                <input type="text" name="${fieldName}[${index}]" placeholder="${fieldName === 'requirements' ? 'Requirement (e.g., Valid passport)' : 'Tip (e.g., Bring warm clothing)'}" required
                       class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                <button type="button" onclick="removeItem(this, '${containerId}')" 
                        class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 rounded-md hover:bg-red-200 dark:hover:bg-red-800 transition">
                    Remove
                </button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
    }

    function removeItem(button, containerId) {
        const container = document.getElementById(containerId);
        const items = container.querySelectorAll('.requirement-item, .tip-item');
        
        if (items.length > 1) {
            button.closest('.requirement-item, .tip-item').remove();
            reindexItems(containerId);
        } else {
            alert(`At least one ${containerId === 'requirements-container' ? 'requirement' : 'tip'} is required.`);
        }
    }

    function reindexItems(containerId) {
        const container = document.getElementById(containerId);
        const fieldName = containerId.replace('-container', '');
        const items = container.querySelectorAll(`.${fieldName}-item`);

        items.forEach((item, index) => {
            const input = item.querySelector(`input[name^="${fieldName}["]`);
            input.name = `${fieldName}[${index}]`;
        });
    }
</script>
@endsection