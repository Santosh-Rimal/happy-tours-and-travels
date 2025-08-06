@extends('layouts.backend.master')

@section('title', 'Trip Request Details')

@section('content')
<div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-4xl mx-auto">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Trip Request Details</h1>
        <a href="{{ route('admin.customizetrips.index') }}" class="flex items-center text-gray-300 hover:text-white transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Back to List
        </a>
    </div>

    <!-- Details Card -->
    <div class="bg-gray-700 rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-600">
            <h2 class="text-xl font-semibold text-white">{{ $customizetrip->name }}</h2>
            <div class="flex items-center mt-1">
                @php
                    $statusColors = [
                        'pending' => 'bg-yellow-500/20 text-yellow-400',
                        'approved' => 'bg-green-500/20 text-green-400',
                        'rejected' => 'bg-red-500/20 text-red-400'
                    ];
                @endphp
                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $statusColors[$customizetrip->status] ?? 'bg-gray-500/20 text-gray-400' }}">
                    {{ ucfirst($customizetrip->status) }}
                </span>
                <span class="ml-2 text-sm text-gray-400">
                    Submitted on {{ $customizetrip->created_at->format('M d, Y') }}
                </span>
            </div>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Column 1 -->
            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-gray-400">Email</p>
                    <p class="mt-1 text-sm text-white">{{ $customizetrip->email }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-400">Phone</p>
                    <p class="mt-1 text-sm text-white">{{ $customizetrip->phone ?? 'N/A' }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-400">Country</p>
                    <p class="mt-1 text-sm text-white">{{ $customizetrip->country ?? 'N/A' }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-400">Trip Reference</p>
                    <p class="mt-1 text-sm text-white">
                        #{{ $customizetrip->trip_id }} - {{ $customizetrip->tripDetail->trip_name ?? 'N/A' }}
                    </p>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-gray-400">Group Size</p>
                    <p class="mt-1 text-sm text-white">{{ $customizetrip->group_size }} people</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-400">Preferred Dates</p>
                    <p class="mt-1 text-sm text-white">
                        {{ $customizetrip->preferred_start_date->format('M d, Y') }}
                    </p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-400">Duration</p>
                    <p class="mt-1 text-sm text-white">{{ $customizetrip->duration }} days</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-400">Budget</p>
                    <p class="mt-1 text-sm text-white">${{ $customizetrip->budget }}</p>
                </div>
            </div>

            <!-- Full width message -->
            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray-400">Additional Message</p>
                <div class="mt-1 p-3 bg-gray-800 rounded text-sm text-gray-300">
                    {{ $customizetrip->message ?? 'No additional message provided' }}
                </div>
            </div>
        </div>

        <!-- Footer with action buttons -->
        <div class="px-6 py-4 bg-gray-800 border-t border-gray-600 flex justify-end space-x-3">
            <a href="{{ route('admin.customizetrips.index') }}" class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-white transition duration-200">
                Back to List
            </a>
            <form action="{{ route('admin.customizetrips.destroy', $customizetrip) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this request?')" 
                    class="px-4 py-2 text-sm font-medium text-red-400 hover:text-red-300 transition duration-200">
                    Delete Request
                </button>
            </form>
        </div>
    </div>
</div>
@endsection