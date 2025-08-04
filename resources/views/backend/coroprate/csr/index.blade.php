@extends('layouts.backend.master')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Recent CSR Activities</h1>
            <a class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300"
                href="{{ route('admin.csrs.create') }}">
                Add New CSR
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($csrs as $csr)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    @if ($csr->image)
                        <img class="w-full h-48 object-cover" src="{{ $csr->image }}" alt="{{ $csr->title }}">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $csr->title }}</h2>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $csr->description }}</p>
                        <div class="flex space-x-2">
                            <a class="text-blue-500 hover:text-blue-700"
                                href="{{ route('admin.csrs.show', $csr->id) }}">View</a>
                            <a class="text-green-500 hover:text-green-700"
                                href="{{ route('admin.csrs.edit', $csr->id) }}">Edit</a>
                            <form action="{{ route('admin.csrs.destroy', $csr->id) }}" method="POST"
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
@endsection
