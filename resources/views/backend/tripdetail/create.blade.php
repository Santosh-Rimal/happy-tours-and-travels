@extends('layouts.backend.master')

@section('title', 'Create New Trip')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow p-6 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Create New Trip</h2>

        <style>
            fieldset {
                @apply border-0 p-0 m-0 mb-8 space-y-6;
            }

            legend {
                @apply w-full px-4 py-3 -mb-2 text-gray-300 bg-gray-800/50 rounded-lg backdrop-blur-sm;
                box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.05);
            }
        </style>

        <form class="space-y-6" action="{{ route('admin.tripdetails.store') }}" method="POST" enctype="multipart/form-data">
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

            <!-- Trip Details Section -->
            <fieldset>
                <legend class="text-xl font-semibold flex items-center space-x-3">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Trip Details</span>
                </legend>

                <!-- Basic Information -->
                <div class="bg-gray-700 rounded-lg p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Trip Name*</label>
                            <input
                                class="w-full bg-gray-600 border @error('trip_name') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                type="text" name="trip_name" value="{{ old('trip_name') }}" required>
                            @error('trip_name')
                                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Trip Category Select Field --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Trip Category*</label>
                            <select
                                class="w-full bg-gray-600 border @error('category_id') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="category_id" name="category_id" required>
                                <option value="" disabled selected>Select a trip...</option>
                                @foreach ($categories as $id => $category)
                                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Destination*</label>
                            <input
                                class="w-full bg-gray-600 border @error('destination') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                type="text" name="destination" value="{{ old('destination') }}" required>
                            @error('destination')
                                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Trip Style*</label>
                            <select
                                class="w-full bg-gray-600 border @error('trip_style') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                name="trip_style" required>
                                <option value="" disabled>Select Trip Style</option>
                                <option value="Trekking" @if (old('trip_style') == 'Trekking') selected @endif>Trekking</option>
                                <option value="Peak Climbing" @if (old('trip_style') == 'Peak Climbing') selected @endif>Peak
                                    Climbing</option>
                                <option value="Tour" @if (old('trip_style') == 'Tour') selected @endif>Tour</option>
                                <option value="Expedition" @if (old('trip_style') == 'Expedition') selected @endif>Expedition
                                </option>
                            </select>
                            @error('trip_style')
                                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Duration*</label>
                            <input
                                class="w-full bg-gray-600 border @error('trip_duration') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                type="text" name="trip_duration" value="{{ old('trip_duration') }}" required>
                            @error('trip_duration')
                                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Inclusions -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-green-400 border-b border-gray-600 pb-2">Inclusions</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Food*</label>
                                <input
                                    class="w-full bg-gray-600 border @error('food') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    type="text" name="food" value="{{ old('food') }}" required>
                                @error('food')
                                    <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Transportation*</label>
                                <input
                                    class="w-full bg-gray-600 border @error('transportation') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    type="text" name="transportation" value="{{ old('transportation') }}" required>
                                @error('transportation')
                                    <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Accommodation*</label>
                                <input
                                    class="w-full bg-gray-600 border @error('accommodation') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    type="text" name="accommodation" value="{{ old('accommodation') }}" required>
                                @error('accommodation')
                                    <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Attributes -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-yellow-400 border-b border-gray-600 pb-2">Attributes</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Group Size*</label>
                                <input
                                    class="w-full bg-gray-600 border @error('group_size') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    type="text" name="group_size" value="{{ old('group_size') }}" required>
                                @error('group_size')
                                    <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Difficulty*</label>
                                <select
                                    class="w-full bg-gray-600 border @error('trip_difficulty') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    name="trip_difficulty" required>
                                    <option value="" disabled>Select Difficulty</option>
                                    <option value="Easy" @if (old('trip_difficulty') == 'Easy') selected @endif>Easy</option>
                                    <option value="Moderate" @if (old('trip_difficulty') == 'Moderate') selected @endif>Moderate
                                    </option>
                                    <option value="Challenging" @if (old('trip_difficulty') == 'Challenging') selected @endif>
                                        Challenging</option>
                                    <option value="Difficult" @if (old('trip_difficulty') == 'Difficult') selected @endif>Difficult
                                    </option>
                                </select>
                                @error('trip_difficulty')
                                    <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Price*</label>
                                <input
                                    class="w-full bg-gray-600 border @error('trip_price') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    type="text" name="trip_price" value="{{ old('trip_price') }}" required>
                                @error('trip_price')
                                    <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Max Elevation*</label>
                                <input
                                    class="w-full bg-gray-600 border @error('max_elevation') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    type="text" name="max_elevation" value="{{ old('max_elevation') }}" required>
                                @error('max_elevation')
                                    <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-purple-400 border-b border-gray-600 pb-2">Description
                        </h3>
                        <textarea
                            class="w-full bg-gray-600 border @error('trip_description') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                            name="trip_description" rows="6" required>{{ old('trip_description') }}</textarea>
                        @error('trip_description')
                            <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="bg-gray-700 rounded-lg p-6">
                        <div class="border-2 border-dashed border-gray-500 rounded-lg p-4 text-center">
                            <input class="dropify" id="hero-upload" type="file" name="sliderimage" required>
                        </div>
                        </label>
                        @error('sliderimage')
                            <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </fieldset>

            {{-- <!-- Hero Image Section -->
            <fieldset>
                <legend class="text-xl font-semibold flex items-center space-x-3">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Hero Image</span>
                </legend>

                <div class="bg-gray-700 rounded-lg p-6">
                    <div class="border-2 border-dashed border-gray-500 rounded-lg p-4 text-center">
                        <input class="hidden" id="hero-upload" type="file" name="hero_image" required>
                        <label class="cursor-pointer" for="hero-upload">
                            <div class="space-y-2">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="text-sm text-gray-300">Click to upload or drag and drop</p>
                                <p class="text-xs text-gray-400">PNG, JPG, JPEG up to 5MB</p>
                            </div>
                        </label>
                        @error('hero_image')
                            <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </fieldset> --}}

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 mt-8">
                <button
                    class="px-6 py-2.5 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition-colors duration-200"
                    type="reset">
                    Cancel
                </button>
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

{{-- Push Select2 CSS and custom dark mode styles --}}
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
            background-color: #080808;
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

{{-- Push Select2 JS and initialize for category_id --}}
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category_id').select2({
                placeholder: "Select a trip...",
                allowClear: true,
                theme: "default"
            });
        });
    </script>
@endpush
