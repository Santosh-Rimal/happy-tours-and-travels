@extends('layouts.backend.master')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8">
                <h1 class="text-2xl font-bold text-white">
                    {{ isset($symptom) ? 'Edit' : 'Create' }} Altitude Sickness Symptoms
                </h1>
                <p class="text-blue-100 mt-1">Manage symptoms for different altitude levels</p>
            </div>

            <!-- Form -->
            <form class="p-6" method="POST"
                action="{{ isset($symptom) ? route('admin.altitudesickness.update', $symptom) : route('admin.altitudesickness.store') }}">
                @csrf
                @if (isset($symptom))
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
                            value="{{ old('title', $symptom->title ?? '') }}"
                            placeholder="e.g., Moderate Altitude Symptoms"
                            required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Mild Symptoms -->
                    <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gray-100 dark:bg-gray-700 px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="font-medium text-gray-800 dark:text-gray-200 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Mild Symptoms
                            </h3>
                        </div>
                        <div class="p-4">
                            <div id="mild-symptoms-container" class="space-y-3">
                                @php
                                    $mildSymptoms = old('mild_symptoms', $symptom->mild_symptoms ?? ['']);
                                @endphp

                                @foreach ($mildSymptoms as $index => $mild_symptom)
                                    <div class="flex space-x-3 symptom-group">
                                        <input
                                            class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                                            type="text" 
                                            name="mild_symptoms[]"
                                            value="{{ $mild_symptom }}"
                                            placeholder="Enter mild symptom"
                                            required>
                                        <button
                                            class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 rounded-md hover:bg-red-200 dark:hover:bg-red-800 transition remove-symptom"
                                            type="button">
                                            ×
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button
                                class="mt-3 px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-md hover:bg-blue-200 dark:hover:bg-blue-800 transition"
                                id="add-mild-symptom"
                                type="button">
                                + Add Mild Symptom
                            </button>
                            @error('mild_symptoms')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Severe Symptoms -->
                    <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gray-100 dark:bg-gray-700 px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="font-medium text-gray-800 dark:text-gray-200 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                Severe Symptoms
                            </h3>
                        </div>
                        <div class="p-4">
                            <div id="severe-symptoms-container" class="space-y-3">
                                @php
                                    $severeSymptoms = old('severe_symptoms', $symptom->severe_symptoms ?? ['']);
                                @endphp

                                @foreach ($severeSymptoms as $index => $severe_symptom)
                                    <div class="flex space-x-3 symptom-group">
                                        <input
                                            class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                                            type="text" 
                                            name="severe_symptoms[]"
                                            value="{{ $severe_symptom }}"
                                            placeholder="Enter severe symptom"
                                            required>
                                        <button
                                            class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 rounded-md hover:bg-red-200 dark:hover:bg-red-800 transition remove-symptom"
                                            type="button">
                                            ×
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button
                                class="mt-3 px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-md hover:bg-blue-200 dark:hover:bg-blue-800 transition"
                                id="add-severe-symptom"
                                type="button">
                                + Add Severe Symptom
                            </button>
                            @error('severe_symptoms')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-between pt-8 mt-8 border-t border-gray-200 dark:border-gray-700">
                    <a class="px-6 py-3 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                        href="{{ route('admin.altitudesickness.index') }}">
                        Cancel
                    </a>
                    <button
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-md"
                        type="submit">
                        {{ isset($symptom) ? 'Update' : 'Create' }} Symptoms
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add mild symptom
        document.getElementById('add-mild-symptom').addEventListener('click', function() {
            addSymptomField('mild-symptoms-container', 'mild_symptoms');
        });

        // Add severe symptom
        document.getElementById('add-severe-symptom').addEventListener('click', function() {
            addSymptomField('severe-symptoms-container', 'severe_symptoms');
        });

        // Remove symptom
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-symptom')) {
                const container = e.target.closest('.symptom-group').parentElement;
                const groups = container.querySelectorAll('.symptom-group');
                
                if (groups.length > 1) {
                    e.target.closest('.symptom-group').remove();
                } else {
                    // Reset the last remaining field instead of removing it
                    const input = groups[0].querySelector('input');
                    input.value = '';
                    input.focus();
                }
            }
        });

        function addSymptomField(containerId, namePrefix) {
            const container = document.getElementById(containerId);
            const newGroup = document.createElement('div');
            newGroup.className = 'flex space-x-3 symptom-group';
            newGroup.innerHTML = `
                <input type="text" 
                       class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200" 
                       name="${namePrefix}[]" 
                       placeholder="Enter ${namePrefix.replace('_', ' ')}"
                       required>
                <button type="button" 
                        class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 rounded-md hover:bg-red-200 dark:hover:bg-red-800 transition remove-symptom">
                    ×
                </button>
            `;
            container.appendChild(newGroup);
            newGroup.querySelector('input').focus();
        }
    });
</script>
@endsection