@extends('layouts.backend.master')

@section('title', 'Create New Trip')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow p-6 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Create Trip Highlight</h2>

        <form class="space-y-6" action="{{ route('admin.itineraries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Error Summary -->
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

            <!-- Trip Selection Dropdown -->
            <div>
                <label class="block text-sm font-medium text-white mb-2" for="trip_detail_id">Select Trip</label>
                <select
                    class="select2 w-full bg-gray-600 text-white border @error('trip_detail_id') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="trip_detail_id" name="trip_detail_id" required>
                    <option value="" disabled selected>Select a trip...</option>
                    @foreach ($trips as $id => $title)
                        <option value="{{ $title->id }}" {{ old('trip_detail_id') == $id ? 'selected' : '' }}>
                            {{ $title->trip_name }}
                        </option>
                    @endforeach
                </select>
                @error('trip_detail_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title -->
            <div>
                <label class="block text-sm font-medium text-white mb-2" for="title">Title</label>
                <input
                    class="w-full bg-gray-600 text-white border @error('title') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="title" type="text" name="title" value="{{ old('title') }}" required
                    placeholder="Enter title">
                @error('title')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-white mb-2" for="description">Description</label>
                <textarea
                    class="w-full bg-gray-600 text-white border @error('description') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="description" name="description" rows="5" required placeholder="Enter description">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 mt-8">
                <a class="px-6 py-2.5 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition-colors duration-200"
                    href="#">
                    Cancel
                </a>
                <button
                    class="px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition-colors duration-200 flex items-center"
                    type="submit">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Create Trip
                </button>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Dark mode fixes for Select2 */
        .select2-container--default .select2-selection--single {
            background-color: #4b5563;
            border-color: #6b7280;
            height: auto;
            min-height: 42px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #f3f4f6;
            line-height: 38px;
            padding-left: 12px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }

        /* Fix for search input text visibility */
        .select2-container--default .select2-search--dropdown .select2-search__field {
            background-color: #374151 !important;
            color: white !important;
            /* Force white text */
            border-color: #4b5563 !important;
        }

        /* Make typed text visible in search box */
        .select2-search__field {
            color: black !important;
        }

        /* Fix for placeholder text in search box */
        .select2-search__field::placeholder {
            color: #9ca3af !important;
        }

        .select2-container--default .select2-results__option {
            background-color: #374151;
            color: #e5e7eb;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #4f46e5;
            color: white;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #1e293b;
            color: #93c5fd;
        }

        .select2-dropdown {
            background-color: #374151;
            border-color: #6b7280;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #9ca3af;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#trip_detail_id').select2({
                placeholder: "Select a trip",
                allowClear: true,
                theme: "default"
            });
        });
    </script>
@endpush
