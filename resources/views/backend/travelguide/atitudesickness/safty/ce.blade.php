@extends('layouts.backend.master')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8">
                <h1 class="text-2xl font-bold text-white">
                    {{ isset($safty) ? 'Edit Safety Measure' : 'Create Safety Measure' }}
                </h1>
                <p class="text-blue-100 mt-1">Manage trekking safety guidelines and requirements</p>
            </div>

            <!-- Form -->
            <form class="p-6" method="POST"
                action="{{ isset($safty) ? route('admin.safetymeasures.update', $safty) : route('admin.safetymeasures.store') }}">
                @csrf
                @if (isset($safty))
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
                            value="{{ old('title', $safty->title ?? '') }}"
                            placeholder="e.g., Emergency Protocols"
                            required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Requirements -->
                    <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gray-100 dark:bg-gray-700 px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="font-medium text-gray-800 dark:text-gray-200 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Safety Requirements
                            </h3>
                        </div>
                        <div class="p-4">
                            <div id="requirements-container" class="space-y-3">
                                @php
                                    $requirements = old('requirements', $safty->requirements ?? ['']);
                                @endphp

                                @foreach ($requirements as $index => $requirement)
                                    <div class="flex space-x-3 requirement-group">
                                        <input
                                            class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                                            type="text" 
                                            name="requirements[]"
                                            value="{{ $requirement }}"
                                            placeholder="Enter safety requirement"
                                            required>
                                        <button
                                            class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 rounded-md hover:bg-red-200 dark:hover:bg-red-800 transition remove-requirement"
                                            type="button">
                                            ×
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button
                                class="mt-3 px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-md hover:bg-blue-200 dark:hover:bg-blue-800 transition"
                                id="add-requirement"
                                type="button">
                                + Add Requirement
                            </button>
                            @error('requirements')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-between pt-8 mt-8 border-t border-gray-200 dark:border-gray-700">
                    <a class="px-6 py-3 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                        href="{{ route('admin.safetymeasures.index') }}">
                        Cancel
                    </a>
                    <button
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-md"
                        type="submit">
                        {{ isset($safty) ? 'Update Safety Measure' : 'Create Safety Measure' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add requirement
        document.getElementById('add-requirement').addEventListener('click', function() {
            addRequirementField();
        });

        // Remove requirement
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-requirement')) {
                const container = e.target.closest('.requirement-group').parentElement;
                const groups = container.querySelectorAll('.requirement-group');
                
                if (groups.length > 1) {
                    e.target.closest('.requirement-group').remove();
                } else {
                    // Reset the last remaining field instead of removing it
                    const input = groups[0].querySelector('input');
                    input.value = '';
                    input.focus();
                }
            }
        });

        function addRequirementField() {
            const container = document.getElementById('requirements-container');
            const newGroup = document.createElement('div');
            newGroup.className = 'flex space-x-3 requirement-group';
            newGroup.innerHTML = `
                <input type="text" 
                       class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200" 
                       name="requirements[]" 
                       placeholder="Enter safety requirement"
                       required>
                <button type="button" 
                        class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 rounded-md hover:bg-red-200 dark:hover:bg-red-800 transition remove-requirement">
                    ×
                </button>
            `;
            container.appendChild(newGroup);
            newGroup.querySelector('input').focus();
        }
    });
</script>
@endsection