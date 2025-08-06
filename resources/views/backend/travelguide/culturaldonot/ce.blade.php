@extends('layouts.backend.master')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-700 p-6">
            <!-- Header Section -->
            <div class="border-b border-gray-700 pb-4 mb-6">
                <h1 class="text-2xl font-bold text-teal-400">
                    {{ isset($culturalDoNot) ? 'Edit Cultural Don\'t' : 'Create Cultural Don\'t' }}
                </h1>
                <p class="text-gray-400 mt-1">
                    {{ isset($culturalDoNot) ? 'Modify existing cultural restriction' : 'Add new cultural restriction' }}
                </p>
            </div>

            <!-- Form Section -->
            <form method="POST"
                action="{{ isset($culturalDoNot) ? route('admin.culturaldoesnots.update', $culturalDoNot) : route('admin.culturaldoesnots.store') }}"
                class="space-y-6">
                @csrf
                @if (isset($culturalDoNot))
                    @method('PUT')
                @endif

                <!-- Title Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Title <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="title"
                           value="{{ old('title', $culturalDoNot->title ?? '') }}"
                           required
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent text-gray-100 placeholder-gray-400 transition duration-200"
                           placeholder="Enter restriction title">
                    @error('title')
                        <p class="mt-2 text-sm text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- What Don't Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        What Not To Do <span class="text-rose-500">*</span>
                    </label>
                    <textarea name="what_donot" 
                              rows="5"
                              required
                              class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent text-gray-100 placeholder-gray-400 transition duration-200"
                              placeholder="Describe what should be avoided">{{ old('what_donot', $culturalDoNot->what_donot ?? '') }}</textarea>
                    @error('what_donot')
                        <p class="mt-2 text-sm text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-4">
                    <a href="{{ route('admin.culturaldoesnots.index') }}"
                       class="px-5 py-2.5 border border-gray-600 rounded-lg text-gray-300 hover:bg-gray-700 transition duration-200">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 bg-gradient-to-r from-teal-500 to-emerald-600 rounded-lg text-white font-medium hover:from-teal-600 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition-all duration-200 shadow-lg">
                        {{ isset($culturalDoNot) ? 'Update Restriction' : 'Create Restriction' }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection