@extends('layouts.backend.master')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
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
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <select
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
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
                        </div>

                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Season Name</label>
                            <input
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                type="text" name="name" required
                                value="@isset($season){{ $season->name }}@endisset">
                        </div>

                        <!-- Months -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Months</label>
                            <input
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                type="text" name="months" required
                                value="@isset($season){{ $season->months }}@endisset">
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                name="description" rows="4" required>
@isset($season)
{{ $season->description }}
@endisset
</textarea>
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="flex justify-between pt-8 mt-8 border-t border-gray-200">
                        <a class="px-6 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                            href="{{ route('admin.seasons.index') }}">
                            Cancel
                        </a>
                        <button
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
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
    <style>
        select,
        input,
        textarea {
            color: black;
        }
    </style>
@endsection
