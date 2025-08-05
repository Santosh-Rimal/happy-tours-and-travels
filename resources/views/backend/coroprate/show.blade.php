@extends('layouts.backend.master')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Item Details</h2>
                </div>

                <div class="p-6">
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <strong>Title:</strong>
                        </label>
                        <p class="mt-1 text-sm text-gray-800 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 px-4 py-3 rounded-md">
                            {{ $item->title }}
                        </p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <strong>Description:</strong>
                        </label>
                        <p class="mt-1 text-sm text-gray-800 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 px-4 py-3 rounded-md whitespace-pre-line">
                            {{ $item->description }}
                        </p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.corporateresponsibilites.index') }}"
                           class="px-4 py-2 bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection