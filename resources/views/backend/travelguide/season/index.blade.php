@extends('layouts.backend.master')

@section('content')
<div class="min-h-screen  dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
            <!-- Header -->
            <div class="border-b border-gray-600 px-6 py-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Seasons Management</h1>
                        <p class="text-blue-100 mt-1">Manage your peak and off-peak seasons</p>
                    </div>
                    <a href="{{ route('admin.seasons.create') }}" 
                       class="bg-white/10 hover:bg-white/20 text-white px-5 py-2.5 rounded-lg transition duration-300 flex items-center gap-2 shadow-md backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Add New Season
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 dark:bg-green-900 border-l-4 border-green-500 dark:border-green-600 text-green-700 dark:text-green-200 p-4 mb-6 rounded-lg">
                        <div class="flex justify-between items-center">
                            <span>{{ session('success') }}</span>
                            <button type="button" class="text-green-700 dark:text-green-200" onclick="this.parentElement.parentElement.style.display='none'">
                                &times;
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Peak Seasons -->
                <div class="mb-12">
                    <div class="flex justify-between items-center mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                            Peak Seasons
                        </h2>
                        <span class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs font-semibold px-2.5 py-0.5 rounded">
                            {{ $peakSeasons->count() }} seasons
                        </span>
                    </div>
                    
                    @if($peakSeasons->isEmpty())
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-8 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-800 dark:text-gray-200">No Peak Seasons Found</h3>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Add peak seasons to highlight your busiest periods</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($peakSeasons as $season)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-600 hover:shadow-lg transition duration-300">
                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-3">
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">{{ $season->name }}</h3>
                                            <p class="text-blue-600 dark:text-blue-400 font-medium">{{ $season->months }}</p>
                                        </div>
                                        <span class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs font-semibold px-2.5 py-0.5 rounded">
                                            Peak
                                        </span>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300">{{ $season->description }}</p>
                                    <div class="mt-4 pt-3 border-t border-gray-200 dark:border-gray-600 flex justify-end space-x-3">
                                        <a href="{{ route('admin.seasons.edit', $season->id) }}" 
                                           class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200"
                                           title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.seasons.destroy', $season->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition duration-200"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this season?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Other Seasons -->
                <div>
                    <div class="flex justify-between items-center mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                            Other Seasons
                        </h2>
                        <span class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 text-xs font-semibold px-2.5 py-0.5 rounded">
                            {{ $otherSeasons->count() }} seasons
                        </span>
                    </div>
                    
                    @if($otherSeasons->isEmpty())
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-8 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-800 dark:text-gray-200">No Other Seasons Found</h3>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Add seasons to manage your different periods</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($otherSeasons as $season)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-600 hover:shadow-lg transition duration-300">
                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-3">
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">{{ $season->name }}</h3>
                                            <p class="text-gray-600 dark:text-gray-400 font-medium">{{ $season->months }}</p>
                                        </div>
                                        <span class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 text-xs font-semibold px-2.5 py-0.5 rounded">
                                            Other
                                        </span>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300">{{ $season->description }}</p>
                                    <div class="mt-4 pt-3 border-t border-gray-200 dark:border-gray-600 flex justify-end space-x-3">
                                        <a href="{{ route('admin.seasons.edit', $season->id) }}" 
                                           class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200"
                                           title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.seasons.destroy', $season->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition duration-200"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this season?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
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
</div>
@endsection