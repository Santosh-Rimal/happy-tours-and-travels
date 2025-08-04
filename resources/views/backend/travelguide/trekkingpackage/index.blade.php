@extends('layouts.backend.master')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Trekking Packages</h1>
                            <p class="text-blue-100 mt-1">Manage Trekking Packages</p>
                        </div>
                        <a class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300"
                            href="{{ route('admin.trekkings.create') }}">
                            Add New TrekkingPackage
                        </a>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="space-y-6">
                        @foreach ($trekkings as $trekking)
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-300">
                                <div class="p-6">
                                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $trekking->title }}</h2>

                                    <div class="mb-4">
                                        <h3 class="font-semibold text-gray-700 mb-2">Requirements</h3>
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach ($trekking->requirements as $requirement)
                                                <li class="text-gray-600">{{ $requirement }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="mb-4">
                                        <h3 class="font-semibold text-gray-700 mb-2">Tips</h3>
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach ($trekking->tips as $tip)
                                                <li class="text-gray-600">{{ $tip }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="flex space-x-3">
                                        <a class="text-blue-500 hover:text-blue-700"
                                            href="{{ route('admin.trekkings.edit', $trekking->id) }}">Edit</a>
                                        <form action="{{ route('admin.trekkings.destroy', $trekking->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500 hover:text-red-700" type="submit">Delete</button>
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
@endsection
