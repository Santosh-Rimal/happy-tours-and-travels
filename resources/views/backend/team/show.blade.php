@extends('layouts.backend.master')

@section('content')
    <div class="min-h-screen  py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="border-b border-gray-600 px-6 py-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Team Member Details</h1>
                            <p class="text-blue-100 mt-1">View team member information</p>
                        </div>
                        <div class="bg-blue-500 p-3 rounded-lg">
                            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Team Member Details -->
                <div class="px-6 py-8">
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/3">
                            <img class="w-full rounded-lg shadow-md" src="{{ $team->image_url }}" alt="{{ $team->name }}">
                        </div>
                        <div class="md:w-2/3">
                            <h2 class="text-2xl font-bold text-white">{{ $team->name }}</h2>
                            <p class="text-lg text-white mt-1">{{ $team->position }}</p>
                            <p class="text-white mt-4">{{ $team->description }}</p>

                            <div class="mt-6">
                                <span
                                    class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
                                    Order: {{ $team->order }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end pt-6  mt-8">
                        <a class="px-6 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                            href="{{ route('admin.teams.index') }}">
                            Back to List
                        </a>
                        <a class="ml-4 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            href="{{ route('admin.teams.edit', $team->id) }}">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
