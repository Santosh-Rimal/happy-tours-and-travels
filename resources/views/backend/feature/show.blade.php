@extends('layouts.backend.master')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Feature Details</h1>
                            <p class="text-blue-100 mt-1">View feature information</p>
                        </div>
                        <div class="bg-blue-500 p-3 rounded-lg">
                            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $feature->icon_path }}" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Feature Details -->
                <div class="px-6 py-8">
                    <div class="flex flex-col md:flex-row gap-8">
                        {{-- <div class="md:w-1/4 flex flex-col items-center text-black">
                            {{ $feature->icon_path }}
                            <div class="mt-4 text-center">
                                <span
                                    class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
                                    Order: {{ $feature->order }}
                                </span>
                            </div>
                        </div> --}}
                        <div class="md:w-3/4">
                            <h2 class="text-2xl font-bold text-gray-800">{{ $feature->title }}</h2>
                            <p class="text-gray-500 mt-4">{{ $feature->description }}</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end pt-6 border-t border-gray-200 mt-8">
                        <a class="px-6 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                            href="{{ route('admin.features.index') }}">
                            Back to List
                        </a>
                        <a class="ml-4 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            href="{{ route('admin.features.edit', $feature->id) }}">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
