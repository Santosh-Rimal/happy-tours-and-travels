@extends('layouts.backend.master')

@section('name', 'Edit Trip')

@section('content')

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

        <form class="space-y-6" action="{{ route('admin.affiliatedpartners.update', $affiliatedpartner->id) }}" method="POST"
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

            <fieldset>
                <legend class="text-xl font-semibold flex items-center space-x-3">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Affiliated & Partners</span>
                </legend>

                <div class="bg-gray-700 rounded-lg p-6 space-y-6">
                    <div class="grid grid-cols-1 gap-6">
                        {{-- Name --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Name*</label>
                            <input
                                class="w-full bg-gray-600 border @error('name') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                type="text" name="name" value="{{ old('name', $affiliatedpartner->name) }}" required>
                            @error('name')
                                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Description --}}
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-purple-400 border-b border-gray-600 pb-2">Description
                        </h3>
                        <textarea
                            class="w-full bg-gray-600 rounded-md px-3 py-2 h-40 border @error('description') border-red-500 @else border-gray-500 @enderror rounded-md px-3 py-2 text-white w-full"
                            name="description">{{ old('description', $affiliatedpartner->description) }}</textarea>
                        @error('description')
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
                    @if ($affiliatedpartner->image)
                        <div class="mb-4">
                            <p class="text-gray-300 mb-2">Current Image:</p>
                            <img class="w-48 h-auto rounded shadow"
                                src="{{ asset('storage/' . $affiliatedpartner->image) }}" alt="Current image">
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
                    href="{{ route('admin.affiliatedpartners.index') }}">
                    Cancel
                </a>
                <button
                    class="px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition-colors duration-200 flex items-center"
                    type="submit">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Affiliatedpartner
                </button>
            </div>
        </form>
    </div>
@endsection
