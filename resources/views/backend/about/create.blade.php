@extends('layouts.backend.master')

@section('title', 'Create About Page')

@section('content')
<div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-white">Create About Page</h2>

    <form class="space-y-6" method="POST" action="{{ route('admin.abouts.store') }}">
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

        <!-- Page Information Section -->
        <div class="space-y-4">
            <h3 class="text-lg font-semibold text-white border-b border-gray-600 pb-2">Page Information</h3>
            
            <div>
                <label class="block text-sm font-medium text-white mb-2" for="page_title">Page Title</label>
                <input
                    class="w-full bg-gray-600 text-white border @error('page_title') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="page_title" type="text" name="page_title" placeholder="About Our Company" value="{{ old('page_title') }}" required>
                @error('page_title')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-2" for="page_subtitle">Page Subtitle</label>
                <input
                    class="w-full bg-gray-600 text-white border @error('page_subtitle') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="page_subtitle" type="text" name="page_subtitle" placeholder="Our story, mission and values" value="{{ old('page_subtitle') }}">
                @error('page_subtitle')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Sections Container -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-white border-b border-gray-600 pb-2">Page Sections</h3>
                <div class="flex space-x-2">
                    <button
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg text-sm flex items-center transition duration-200"
                        type="button" onclick="addContentSection()">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Content
                    </button>
                    <button
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg text-sm flex items-center transition duration-200"
                        type="button" onclick="addStatsSection()">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Add Stats
                    </button>
                </div>
            </div>

            <div class="space-y-4" id="section-container">
                <!-- Empty State -->
                @if (!old('sections'))
                    <div class="text-center py-12 bg-gray-700 rounded-lg border-2 border-dashed border-gray-600" id="empty-state">
                        <svg class="h-16 w-16 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-300">No sections added yet</h3>
                        <p class="mt-1 text-sm text-gray-400 max-w-md mx-auto">Add your first section using the buttons above</p>
                    </div>
                @endif

                <!-- Render old sections if form validation fails -->
                @if (old('sections'))
                    @foreach (old('sections') as $index => $section)
                        @if ($section['section_type'] == 'content')
                            <div class="section-card bg-gray-700 rounded-lg border border-gray-600 p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-md bg-blue-600 flex items-center justify-center mr-3">
                                            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                            </svg>
                                        </div>
                                        <span class="font-medium text-white">Content Section</span>
                                    </div>
                                    <button class="text-gray-400 hover:text-red-400 transition" type="button" onclick="this.parentElement.parentElement.remove(); checkEmptyState();">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                                <input type="hidden" name="sections[{{ $index }}][section_type]" value="content" />
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-white mb-2">Section Title</label>
                                        <input
                                            class="w-full bg-gray-600 text-white border @error('sections.' . $index . '.section_title') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            type="text" name="sections[{{ $index }}][section_title]" value="{{ $section['section_title'] }}" required>
                                        @error('sections.' . $index . '.section_title')
                                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-white mb-2">Order</label>
                                        <input
                                            class="w-full bg-gray-600 text-white border border-gray-500 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            type="number" name="sections[{{ $index }}][order]" value="{{ $section['order'] ?? $index + 1 }}" required>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-white mb-2">Section Content</label>
                                        <textarea
                                            class="w-full bg-gray-600 text-white border @error('sections.' . $index . '.section_content') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[100px]"
                                            name="sections[{{ $index }}][section_content]" required>{{ $section['section_content'] }}</textarea>
                                        @error('sections.' . $index . '.section_content')
                                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @elseif($section['section_type'] == 'stats')
                            <div class="section-card bg-gray-700 rounded-lg border border-gray-600 p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-md bg-indigo-600 flex items-center justify-center mr-3">
                                            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                        </div>
                                        <span class="font-medium text-white">Stats Section</span>
                                    </div>
                                    <button class="text-gray-400 hover:text-red-400 transition" type="button" onclick="this.parentElement.parentElement.remove(); checkEmptyState();">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                                <input type="hidden" name="sections[{{ $index }}][section_type]" value="stats" />
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-white mb-2">Stat Value</label>
                                        <input
                                            class="w-full bg-gray-600 text-white border @error('sections.' . $index . '.stat_value') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            type="text" name="sections[{{ $index }}][stat_value]" value="{{ $section['stat_value'] }}" required>
                                        @error('sections.' . $index . '.stat_value')
                                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-white mb-2">Stat Label</label>
                                        <input
                                            class="w-full bg-gray-600 text-white border @error('sections.' . $index . '.stat_label') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            type="text" name="sections[{{ $index }}][stat_label]" value="{{ $section['stat_label'] }}" required>
                                        @error('sections.' . $index . '.stat_label')
                                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-white mb-2">Order</label>
                                        <input
                                            class="w-full bg-gray-600 text-white border border-gray-500 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            type="number" name="sections[{{ $index }}][order]" value="{{ $section['order'] ?? $index + 1 }}" required>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

        <div class="flex justify-end space-x-4 mt-8">
            <a class="px-6 py-2.5 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition duration-200"
                href="{{ route('admin.abouts.index') }}">
                Cancel
            </a>
            <button class="px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg flex items-center transition duration-200"
                type="submit">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Save About Page
            </button>
        </div>
    </form>
</div>

<script>
    let sectionIndex = {{ old('sections') ? count(old('sections')) : 0 }};

    function addContentSection() {
        const container = document.getElementById('section-container');
        const emptyState = document.getElementById('empty-state');

        // Remove empty state if it exists
        if (emptyState) {
            emptyState.remove();
        }

        const html = `
            <div class="section-card bg-gray-700 rounded-lg border border-gray-600 p-4">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-md bg-blue-600 flex items-center justify-center mr-3">
                            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </div>
                        <span class="font-medium text-white">Content Section</span>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove(); checkEmptyState();" 
                        class="text-gray-400 hover:text-red-400 transition">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
                <input type="hidden" name="sections[${sectionIndex}][section_type]" value="content" />
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Section Title</label>
                        <input class="w-full bg-gray-600 text-white border border-gray-500 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               type="text" name="sections[${sectionIndex}][section_title]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Order</label>
                        <input class="w-full bg-gray-600 text-white border border-gray-500 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               type="number" name="sections[${sectionIndex}][order]" value="${sectionIndex + 1}" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-white mb-2">Section Content</label>
                        <textarea class="w-full bg-gray-600 text-white border border-gray-500 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[100px]" 
                                  name="sections[${sectionIndex}][section_content]" required></textarea>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        sectionIndex++;
    }

    function addStatsSection() {
        const container = document.getElementById('section-container');
        const emptyState = document.getElementById('empty-state');

        // Remove empty state if it exists
        if (emptyState) {
            emptyState.remove();
        }

        const html = `
            <div class="section-card bg-gray-700 rounded-lg border border-gray-600 p-4">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-md bg-indigo-600 flex items-center justify-center mr-3">
                            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <span class="font-medium text-white">Stats Section</span>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove(); checkEmptyState();" 
                        class="text-gray-400 hover:text-red-400 transition">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
                <input type="hidden" name="sections[${sectionIndex}][section_type]" value="stats" />
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Stat Value</label>
                        <input class="w-full bg-gray-600 text-white border border-gray-500 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                               type="text" name="sections[${sectionIndex}][stat_value]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Stat Label</label>
                        <input class="w-full bg-gray-600 text-white border border-gray-500 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                               type="text" name="sections[${sectionIndex}][stat_label]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Order</label>
                        <input class="w-full bg-gray-600 text-white border border-gray-500 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                               type="number" name="sections[${sectionIndex}][order]" value="${sectionIndex + 1}" required>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        sectionIndex++;
    }

    function checkEmptyState() {
        const container = document.getElementById('section-container');
        
        // If no sections left, add empty state
        if (container.children.length === 0) {
            const emptyHtml = `
                <div class="text-center py-12 bg-gray-700 rounded-lg border-2 border-dashed border-gray-600" id="empty-state">
                    <svg class="h-16 w-16 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-300">No sections added yet</h3>
                    <p class="mt-1 text-sm text-gray-400 max-w-md mx-auto">Add your first section using the buttons above</p>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', emptyHtml);
        }
    }
</script>
@endsection