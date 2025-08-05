@extends('layouts.backend.master')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Visa Information</h1>
                        <p class="text-blue-100 mt-1">Manage visa on arrival and other visa types</p>
                    </div>
                    <a class="bg-white/10 hover:bg-white/20 text-white px-5 py-2.5 rounded-lg transition duration-300 flex items-center gap-2 shadow-md backdrop-blur-sm"
                       href="{{ route('admin.visas.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Add New Visa Info
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                @if (session('success'))
                    <div class="bg-green-100 dark:bg-green-900 border-l-4 border-green-500 dark:border-green-600 text-green-700 dark:text-green-200 p-4 mb-6 rounded-lg">
                        <div class="flex justify-between items-center">
                            <span>{{ session('success') }}</span>
                            <button type="button" class="text-green-700 dark:text-green-200" onclick="this.parentElement.parentElement.style.display='none'">
                                &times;
                            </button>
                        </div>
                    </div>
                @endif

                @if($visaInfos->isEmpty())
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-8 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-800 dark:text-gray-200">No Visa Information Found</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">Get started by adding your first visa information</p>
                    </div>
                @else
                    <div class="space-y-6">
                        @foreach ($visaInfos as $visaInfo)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-600 hover:shadow-lg transition duration-300">
                                <div class="p-6">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">{{ $visaInfo->title }}</h2>
                                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $visaInfo->description }}</p>
                                        </div>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.visas.edit', $visaInfo->id) }}" 
                                               class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200"
                                               title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.visas.destroy', $visaInfo->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition duration-200"
                                                        title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this visa information?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                                        <h3 class="font-semibold text-gray-700 dark:text-gray-300 mb-3">Requirements</h3>
                                        <ul class="space-y-2">
                                            @foreach ($visaInfo->requirements as $requirement)
                                                <li class="flex items-start text-gray-600 dark:text-gray-300">
                                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span>{{ $requirement }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection