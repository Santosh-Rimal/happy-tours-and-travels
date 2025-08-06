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
                            @isset($visaInfo)
                                Edit Visa Information
                            @else
                                Add New Visa Information
                            @endisset
                        </h1>
                        <p class="text-blue-100 mt-1">Manage visa requirements and details</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form class="p-6" method="POST"
                action="@isset($visaInfo) {{ route('admin.visas.update', $visaInfo->id) }} @else {{ route('admin.visas.store') }} @endisset">
                @csrf
                @isset($visaInfo)
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
                            value="{{ old('title', $visaInfo->title ?? '') }}"
                            placeholder="e.g., Visa on Arrival Requirements">
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
                            placeholder="Brief description about the visa">{{ old('description', $visaInfo->description ?? '') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Requirements -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Requirements</label>
                        <div class="space-y-3" id="requirements-container">
                            @isset($visaInfo)
                                @foreach (old('requirements', $visaInfo->requirements) as $index => $requirement)
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
                                            onclick="removeRequirementItem(this)">
                                            Remove
                                        </button>
                                    </div>
                                @endforeach
                            @else
                                @foreach (old('requirements', ['']) as $index => $requirement)
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
                                            onclick="removeRequirementItem(this)">
                                            Remove
                                        </button>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                        <button 
                            class="mt-2 px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-md hover:bg-blue-200 dark:hover:bg-blue-800 transition"
                            type="button" 
                            onclick="addRequirementItem()">
                            Add Requirement
                        </button>
                        @error('requirements')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-between pt-8 mt-8 border-t border-gray-200 dark:border-gray-700">
                    <a class="px-6 py-3 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                        href="{{ route('admin.visas.index') }}">
                        Cancel
                    </a>
                    <button
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-md"
                        type="submit">
                        @isset($visaInfo)
                            Update Visa Info
                        @else
                            Add Visa Info
                        @endisset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Requirements Functions
    function addRequirementItem() {
        const container = document.getElementById('requirements-container');
        const index = container.querySelectorAll('.requirement-item').length;

        const html = `
        <div class="requirement-item flex space-x-3">
            <input type="text" name="requirements[${index}]" placeholder="Requirement (e.g., Valid passport)" required
                   class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200">
            <button type="button" onclick="removeRequirementItem(this)" 
                    class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 rounded-md hover:bg-red-200 dark:hover:bg-red-800 transition">
                Remove
            </button>
        </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
    }

    function removeRequirementItem(button) {
        const items = document.querySelectorAll('.requirement-item');
        if (items.length > 1) {
            button.closest('.requirement-item').remove();
            reindexRequirementItems();
        } else {
            alert('At least one requirement is required.');
        }
    }

    function reindexRequirementItems() {
        const container = document.getElementById('requirements-container');
        const items = container.querySelectorAll('.requirement-item');

        items.forEach((item, index) => {
            const input = item.querySelector('input[name^="requirements["]');
            input.name = `requirements[${index}]`;
        });
    }
</script>
@endsection