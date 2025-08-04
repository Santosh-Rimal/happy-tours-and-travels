@extends('layouts.backend.master')

@section('title', 'Edit Trip')

@section('content')
    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>

    <div class="bg-gray-800 rounded-lg shadow p-6 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Edit Trip</h2>

        <style>
            fieldset {
                @apply border-0 p-0 m-0 mb-8 space-y-6;
            }

            legend {
                @apply w-full px-4 py-3 -mb-2 text-gray-300 bg-gray-800/50 rounded-lg backdrop-blur-sm;
                box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.05);
            }
        </style>

        <form class="space-y-6" action="{{ route('admin.abouttrips.update', $abouttrip->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Error Summary --}}
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

            {{-- About Trip Section --}}
            <fieldset>
                <legend class="text-xl font-semibold flex items-center space-x-3">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>About Trip</span>
                </legend>

                <div class="bg-gray-700 rounded-lg p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Title --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Title*</label>
                            <input
                                class="w-full bg-gray-600 border @error('title') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                type="text" name="title" value="{{ old('title', $abouttrip->title) }}" required>
                            @error('title')
                                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Trip Dropdown --}}
                        <div>
                            <label class="block text-sm font-medium text-white mb-2" for="trip_detail_id">Select
                                Trip</label>
                            <select
                                class="select2 w-full border @error('trip_detail_id') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="trip_detail_id" name="trip_detail_id" required>
                                <option value="" disabled>Select a trip...</option>
                                @foreach ($trips as $trip)
                                    <option value="{{ $trip->id }}"
                                        {{ old('trip_detail_id', $abouttrip->trip_detail_id) == $trip->id ? 'selected' : '' }}>
                                        {{ $trip->trip_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('trip_detail_id')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Description --}}
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-purple-400 border-b border-gray-600 pb-2">Description
                        </h3>
                        <textarea
                            class="ckeditor border @error('trip_description') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white w-full"
                            name="trip_description">{{ old('trip_description', $abouttrip->trip_description) }}</textarea>
                        @error('trip_description')
                            <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </fieldset>

            {{-- Hero Image Section --}}
            <fieldset>
                <legend class="text-xl font-semibold flex items-center space-x-3">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Hero Image</span>
                </legend>

                <div class="bg-gray-700 rounded-lg p-6 space-y-4">
                    {{-- Current Image Preview --}}
                    @if ($abouttrip->image)
                        <div class="mb-4">
                            <p class="text-gray-300 mb-2">Current Image:</p>
                            <img class="w-48 h-auto rounded shadow" src="{{ asset('storage/' . $abouttrip->image) }}"
                                alt="Current image">
                        </div>
                    @endif

                    <div class="border-2 border-dashed border-gray-500 rounded-lg p-4 text-center">
                        <input class="dropify text-white" type="file" name="image">
                    </div>
                    @error('image')
                        <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>

            {{-- Form Actions --}}
            <div class="flex justify-end space-x-4 mt-8">
                <a class="px-6 py-2.5 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition-colors duration-200"
                    href="{{ route('admin.abouttrips.index') }}">
                    Cancel
                </a>
                <button
                    class="px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition-colors duration-200 flex items-center"
                    type="submit">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Trip
                </button>
            </div>
        </form>
    </div>

    {{-- CKEditor Init Script --}}
    <script>
        function ckeditor($className) {
            CKEDITOR.ClassicEditor.create(document.querySelector("." + $className), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript',
                        'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                        'alignment', '|',
                        'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                },
                placeholder: '',
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                fontSize: {
                    options: [8, 10, 12, 14, 'default', 18, 20, 22, 24, 26, 28, 30, 32, 34, 36],
                    supportAllValues: true
                },
                htmlSupport: {
                    allow: [{
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }]
                },
                htmlEmbed: {
                    showPreviews: true
                },
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                mention: {
                    feeds: [{
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@candy', '@canes', '@chocolate',
                            '@cookie',
                            '@cotton', '@cream', '@cupcake', '@danish', '@donut', '@dragée',
                            '@fruitcake',
                            '@gingerbread', '@gummi', '@ice', '@jelly-o', '@liquorice', '@macaroon',
                            '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps',
                            '@soufflé', '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }]
                },
                removePlugins: [
                    'CKBox', 'CKFinder', 'EasyImage', 'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges', 'RealTimeCollaborativeRevisionHistory',
                    'PresenceList', 'Comments', 'TrackChanges', 'TrackChangesData', 'RevisionHistory',
                    'Pagination', 'WProofreader', 'MathType'
                ]
            });
        }

        // Call the function on load
        document.addEventListener("DOMContentLoaded", function() {
            ckeditor("ckeditor");
        });
    </script>
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
                theme: "classic"
            });
        });
    </script>
@endpush
