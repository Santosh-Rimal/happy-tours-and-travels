@extends('layouts.backend.master')

@section('content')
<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Seasons Management</h1>
                        <p class="text-blue-100 mt-1">Manage your peak and off-peak seasons</p>
                    </div>
                    <a href="{{ route('admin.seasons.create') }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300">
                        Add New Season
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Peak Seasons -->
                <div class="mb-12">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                        Peak Seasons
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($peakSeasons as $season)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800">{{ $season->name }}</h3>
                                        <p class="text-blue-600 font-medium">{{ $season->months }}</p>
                                    </div>
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                        Peak
                                    </span>
                                </div>
                                <p class="mt-3 text-gray-600">{{ $season->description }}</p>
                                <div class="mt-4 flex space-x-3">
                                    <a href="{{ route('admin.seasons.edit', $season->id) }}" 
                                       class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <form action="{{ route('admin.seasons.destroy', $season->id) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Other Seasons -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                        Other Seasons
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($otherSeasons as $season)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800">{{ $season->name }}</h3>
                                        <p class="text-gray-600 font-medium">{{ $season->months }}</p>
                                    </div>
                                    <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                        Other
                                    </span>
                                </div>
                                <p class="mt-3 text-gray-600">{{ $season->description }}</p>
                                <div class="mt-4 flex space-x-3">
                                    <a href="{{ route('admin.seasons.edit', $season->id) }}" 
                                       class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <form action="{{ route('admin.seasons.destroy', $season->id) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection