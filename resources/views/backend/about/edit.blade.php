@extends('layouts.backend.master')

@section('content')
    <div class="min-h-screen  py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gradient-to-r  px-6 py-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Edit About Page</h1>
                            <p class="text-blue-100 mt-1">Update your about page content</p>
                        </div>
                        <div class="bg-blue-500 p-3 rounded-lg">
                            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Main Form -->
                <form class="px-6 py-8" method="POST" action="{{ route('admin.abouts.update', $about->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Page Info Section -->
                    <div class="mb-10">
                        <h2 class="text-xl font-semibold text-white mb-6 pb-2 border-b border-gray-200">Page Information
                        </h2>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-medium text-white mb-2">Page Title</label>
                                <input
                                    class="w-full px-4 py-3 border @error('page_title') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    type="text" name="page_title" placeholder="About Our Company"
                                    value="{{ old('page_title', $about->page_title) }}" required>
                                @error('page_title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-white mb-2">Page Subtitle</label>
                                <input
                                    class="w-full px-4 py-3 border @error('page_subtitle') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    type="text" name="page_subtitle" placeholder="Our story, mission and values"
                                    value="{{ old('page_subtitle', $about->page_subtitle) }}" required>
                                @error('page_subtitle')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Sections Container -->
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-white">Page Sections</h2>
                            <button class="flex items-center text-blue-600 hover:text-blue-800 font-medium"
                                id="preview-toggle" type="button">
                                <svg class="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Toggle Preview
                            </button>
                        </div>

                        <div class="space-y-4" id="sections-container">
                            <!-- Empty State -->
                            @if (!old('sections') && count($about->sections) === 0)
                                <div class="text-center py-12 bg-gray-600 rounded-xl border-2 border-dashed border-gray-300"
                                    id="empty-state">
                                    <svg class="h-16 w-16 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <h3 class="mt-4 text-lg font-medium text-gray-700">No sections added yet</h3>
                                    <p class="mt-1 text-sm text-gray-500 max-w-md mx-auto">Add your first section using the
                                        buttons below</p>
                                </div>
                            @endif

                            <!-- Render sections from database or old input -->
                            @php
                                $sections = old('sections') ?? $about->sections;
                            @endphp

                            @if ($sections)
                                @foreach ($sections as $index => $section)
                                    @if ($section['section_type'] === 'content')
                                        <div
                                            class="section-card group relative bg-white rounded-xl border border-gray-200 overflow-hidden transition-all duration-200 hover:shadow-md mb-4">
                                            <div
                                                class="flex items-center justify-between px-5 py-4 bg-gray-50 border-b border-gray-200">
                                                <div class="flex items-center">
                                                    <div
                                                        class="drag-handle mr-3 cursor-move text-gray-400 hover:text-gray-600">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                                        </svg>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <div
                                                            class="w-8 h-8 rounded-md bg-blue-100 flex items-center justify-center mr-3">
                                                            <svg class="h-5 w-5 text-blue-600"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                                            </svg>
                                                        </div>
                                                        <span class="font-medium text-gray-700">Content Section</span>
                                                    </div>
                                                </div>
                                                <button class="text-gray-400 hover:text-red-500 transition" type="button"
                                                    onclick="this.parentElement.parentElement.parentElement.remove(); checkEmptyState();">
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <input type="hidden" name="sections[{{ $index }}][section_type]"
                                                    value="content" />
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Section
                                                            Title</label>
                                                        <input
                                                            class="w-full px-3 py-2 border @error('sections.' . $index . '.section_title') border-red-500 @else border-gray-300 @enderror rounded-md focus:ring-blue-500 focus:border-blue-500"
                                                            type="text"
                                                            name="sections[{{ $index }}][section_title]"
                                                            value="{{ $section['section_title'] }}" required>
                                                        @error('sections.' . $index . '.section_title')
                                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                                                        <input
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                                            type="number" name="sections[{{ $index }}][order]"
                                                            value="{{ $section['order'] ?? $index + 1 }}" required>
                                                    </div>
                                                    <div class="md:col-span-2">
                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Section
                                                            Content</label>
                                                        <textarea
                                                            class="w-full px-3 py-2 border @error('sections.' . $index . '.section_content') border-red-500 @else border-gray-300 @enderror rounded-md focus:ring-blue-500 focus:border-blue-500"
                                                            name="sections[{{ $index }}][section_content]" rows="3" required>{{ $section['section_content'] }}</textarea>
                                                        @error('sections.' . $index . '.section_content')
                                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($section['section_type'] === 'stats')
                                        <div
                                            class="section-card group relative bg-white rounded-xl border border-gray-200 overflow-hidden transition-all duration-200 hover:shadow-md mb-4">
                                            <div
                                                class="flex items-center justify-between px-5 py-4 bg-gray-50 border-b border-gray-200">
                                                <div class="flex items-center">
                                                    <div
                                                        class="drag-handle mr-3 cursor-move text-gray-400 hover:text-gray-600">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                                        </svg>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <div
                                                            class="w-8 h-8 rounded-md bg-indigo-100 flex items-center justify-center mr-3">
                                                            <svg class="h-5 w-5 text-indigo-600"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                            </svg>
                                                        </div>
                                                        <span class="font-medium text-gray-700">Stats Section</span>
                                                    </div>
                                                </div>
                                                <button class="text-gray-400 hover:text-red-500 transition" type="button"
                                                    onclick="this.parentElement.parentElement.parentElement.remove(); checkEmptyState();">
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <input type="hidden" name="sections[{{ $index }}][section_type]"
                                                    value="stats" />
                                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Stat
                                                            Value</label>
                                                        <input
                                                            class="w-full px-3 py-2 border @error('sections.' . $index . '.stat_value') border-red-500 @else border-gray-300 @enderror rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                                            type="text"
                                                            name="sections[{{ $index }}][stat_value]"
                                                            value="{{ $section['stat_value'] }}" required>
                                                        @error('sections.' . $index . '.stat_value')
                                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Stat
                                                            Label</label>
                                                        <input
                                                            class="w-full px-3 py-2 border @error('sections.' . $index . '.stat_label') border-red-500 @else border-gray-300 @enderror rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                                            type="text"
                                                            name="sections[{{ $index }}][stat_label]"
                                                            value="{{ $section['stat_label'] }}" required>
                                                        @error('sections.' . $index . '.stat_label')
                                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                                                        <input
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                                            type="number" name="sections[{{ $index }}][order]"
                                                            value="{{ $section['order'] ?? $index + 1 }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        <!-- Add Section Buttons -->
                        <div class="mt-6 flex space-x-3">
                            <button
                                class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                type="button" onclick="addContentSection()">
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Add Content Section
                            </button>

                            <button
                                class="flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                type="button" onclick="addStatsSection()">
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Add Stats Section
                            </button>
                        </div>
                    </div>

                    <!-- Preview Section -->
                    <div class="bg-gray-50 rounded-xl p-6 mb-8 border border-gray-200 hidden" id="preview-container">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-700">Preview</h3>
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">LIVE</span>
                        </div>

                        <div class="space-y-6" id="preview-content">
                            <!-- Preview will be rendered here -->
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-between pt-4 border-t border-gray-200">
                        <a class="px-6 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                            href="{{ route('admin.abouts.index') }}">
                            Cancel
                        </a>
                        <button
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            type="submit">
                            Update About Page
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Templates -->
    <template id="content-section-template">
        <div
            class="section-card group relative bg-white rounded-xl border border-gray-200 overflow-hidden transition-all duration-200 hover:shadow-md mb-4">
            <div class="flex items-center justify-between px-5 py-4 bg-gray-50 border-b border-gray-200">
                <div class="flex items-center">
                    <div class="drag-handle mr-3 cursor-move text-gray-400 hover:text-gray-600">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                        </svg>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-md bg-blue-100 flex items-center justify-center mr-3">
                            <svg class="h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-700">Content Section</span>
                    </div>
                </div>
                <button class="text-gray-400 hover:text-red-500 transition" type="button"
                    onclick="this.parentElement.parentElement.parentElement.remove(); checkEmptyState();">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
            <div class="p-5">
                <input type="hidden" name="sections[][section_type]" value="content" />
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Section Title</label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            type="text" name="sections[][section_title]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            type="number" name="sections[][order]" value="1" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Section Content</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            name="sections[][section_content]" rows="3" required></textarea>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <template id="stats-section-template">
        <div
            class="section-card group relative bg-white rounded-xl border border-gray-200 overflow-hidden transition-all duration-200 hover:shadow-md mb-4">
            <div class="flex items-center justify-between px-5 py-4 bg-gray-50 border-b border-gray-200">
                <div class="flex items-center">
                    <div class="drag-handle mr-3 cursor-move text-gray-400 hover:text-gray-600">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                        </svg>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-md bg-indigo-100 flex items-center justify-center mr-3">
                            <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-700">Stats Section</span>
                    </div>
                </div>
                <button class="text-gray-400 hover:text-red-500 transition" type="button"
                    onclick="this.parentElement.parentElement.parentElement.remove(); checkEmptyState();">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
            <div class="p-5">
                <input type="hidden" name="sections[][section_type]" value="stats" />
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Stat Value</label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            type="text" name="sections[][stat_value]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Stat Label</label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            type="text" name="sections[][stat_label]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            type="number" name="sections[][order]" value="1" required>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let sectionCount = {{ isset($sections) ? count($sections) : 0 }};
            const sectionsContainer = document.getElementById('sections-container');
            const emptyState = document.getElementById('empty-state');
            const previewContainer = document.getElementById('preview-container');
            const previewToggle = document.getElementById('preview-toggle');

            // Add Content Section
            document.getElementById('add-content-section').addEventListener('click', function() {
                addSection('content');
            });

            // Add Stats Section
            document.getElementById('add-stats-section').addEventListener('click', function() {
                addSection('stats');
            });

            // Toggle Preview
            previewToggle.addEventListener('click', function() {
                previewContainer.classList.toggle('hidden');
                updatePreview();
            });

            // Add section function
            function addSection(type) {
                sectionCount++;

                // Remove empty state if it's the first section
                if (sectionCount === 1 && emptyState) {
                    emptyState.remove();
                }

                const templateId = `${type}-section-template`;
                const template = document.getElementById(templateId);
                const clone = template.content.cloneNode(true);

                // Set order value
                const orderInput = clone.querySelector('input[name$="[order]"]');
                if (orderInput) {
                    orderInput.value = sectionCount;
                }

                // Add to container
                sectionsContainer.appendChild(clone);

                // Add event listeners to new section
                const newSection = sectionsContainer.lastElementChild;
                addSectionEventListeners(newSection);

                // Update preview
                updatePreview();
            }

            // Add event listeners to a section
            function addSectionEventListeners(section) {
                // Remove section
                const removeBtn = section.querySelector('.remove-section');
                removeBtn.addEventListener('click', function() {
                    section.remove();
                    sectionCount--;

                    // Show empty state if no sections left
                    if (sectionCount === 0) {
                        sectionsContainer.appendChild(emptyState);
                    }

                    // Update preview
                    updatePreview();
                });

                // Add input listeners for live preview
                const inputs = section.querySelectorAll('input, textarea');
                inputs.forEach(input => {
                    input.addEventListener('input', updatePreview);
                });

                // Add drag handle for reordering (implementation would require a drag-and-drop library)
                const dragHandle = section.querySelector('.drag-handle');
                dragHandle.addEventListener('mousedown', function() {
                    // This would be implemented with a drag-and-drop library like SortableJS
                    console.log('Drag started - would implement reordering here');
                });
            }

            // Update preview function
            function updatePreview() {
                // Update page info
                const pageTitle = document.getElementById('page_title').value || 'About Hamro Tours and Travel';
                const pageSubtitle = document.getElementById('page_subtitle').value ||
                    'Your trusted partner in creating unforgettable travel experiences across Nepal and beyond';

                // Update sections preview
                const previewContent = document.getElementById('preview-content');
                previewContent.innerHTML = `
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-800">${pageTitle}</h1>
                        <p class="text-xl text-gray-600 mt-2">${pageSubtitle}</p>
                    </div>
                `;

                const sections = sectionsContainer.querySelectorAll('.section-card');

                sections.forEach(section => {
                    if (section.querySelector('input[name$="[section_type]"]').value === 'content') {
                        const title = section.querySelector('input[name$="[section_title]"]')?.value ||
                            'Our Journey';
                        const content = section.querySelector('textarea[name$="[section_content]"]')
                            ?.value ||
                            'Founded in Kathmandu with a passion for showcasing Nepal\'s breathtaking beauty...';

                        previewContent.innerHTML += `
                            <div class="mb-8">
                                <h2 class="text-2xl font-semibold text-gray-800 mb-3">${title}</h2>
                                <p class="text-gray-600 leading-relaxed">${content}</p>
                            </div>
                        `;
                    } else {
                        const value = section.querySelector('input[name$="[stat_value]"]')?.value || '15+';
                        const label = section.querySelector('input[name$="[stat_label]"]')?.value ||
                            'Years Experience';

                        previewContent.innerHTML += `
                            <div class="bg-blue-50 rounded-lg p-6 mb-6">
                                <div class="text-5xl font-bold text-blue-600">${value}</div>
                                <div class="text-lg font-medium text-gray-700 mt-2">${label}</div>
                            </div>
                        `;
                    }
                });

                // If no sections, show empty preview
                if (sections.length === 0) {
                    previewContent.innerHTML +=
                        '<p class="text-gray-500 text-center py-6">No sections added yet</p>';
                }
            }

            // Initialize preview
            updatePreview();
        });

        function checkEmptyState() {
            const container = document.getElementById('sections-container');
            const emptyState = document.getElementById('empty-state');

            // If no sections left, add empty state
            if (container.children.length === 0) {
                const emptyHtml = `
                    <div class="text-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300" id="empty-state">
                        <svg class="h-16 w-16 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-700">No sections added yet</h3>
                        <p class="mt-1 text-sm text-gray-500 max-w-md mx-auto">Add your first section using the buttons below</p>
                    </div>
                `;
                container.insertAdjacentHTML('beforeend', emptyHtml);
            }
        }
    </script>

    <style>
        input,
        textarea {
            color: black;
        }

        .section-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .section-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
        }

        .border-red-500 {
            border-color: #ef4444;
        }

        .border-red-500:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.5);
        }

        .drag-handle {
            cursor: grab;
        }

        .drag-handle:active {
            cursor: grabbing;
        }
    </style>
@endsection
