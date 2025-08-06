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
                            @isset($season)
                                Edit Season
                            @else
                                Add New Season
                            @endisset
                        </h1>
                        <p class="text-blue-100 mt-1">Manage season details</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form class="p-6" method="POST"
                action="@isset($season) {{ route('admin.seasons.update', $season->id) }} @else {{ route('admin.seasons.store') }} @endisset">
                @csrf
                @isset($season)
                    @method('PUT')
                @endisset

                <div class="space-y-6">
                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                        <select
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            name="category" required>
                            <option value="peak_seasons"
                                @isset($season) {{ $season->category == 'peak_seasons' ? 'selected' : '' }} @endisset>
                                Peak Seasons
                            </option>
                            <option value="other_seasons"
                                @isset($season) {{ $season->category == 'other_seasons' ? 'selected' : '' }} @endisset>
                                Other Seasons
                            </option>
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Season Name</label>
                        <input
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            type="text" 
                            name="name" 
                            required
                            value="{{ old('name', $season->name ?? '') }}"
                            placeholder="e.g. Summer Peak">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Months -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Months</label>
                        <input
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            type="text" 
                            name="months" 
                            required
                            value="{{ old('months', $season->months ?? '') }}"
                            placeholder="e.g. June - August">
                        @error('months')
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
                            required
                            placeholder="Describe the season characteristics">{{ old('description', $season->description ?? '') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-between pt-8 mt-8 border-t border-gray-200 dark:border-gray-700">
                    <a class="px-6 py-3 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                        href="{{ route('admin.seasons.index') }}">
                        Cancel
                    </a>
                    <button
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-md"
                        type="submit">
                        @isset($season)
                            Update Season
                        @else
                            Add Season
                        @endisset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection