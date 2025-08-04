@extends('layouts.backend.master')
@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if ($csr->image)
                <img class="w-full h-64 object-cover" src="{{ $csr->image }}" alt="{{ $csr->title }}">
            @else
                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">No Image Available</span>
                </div>
            @endif

            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $csr->title }}</h1>
                <div class="prose max-w-none text-gray-700 mb-6">
                    {!! nl2br(e($csr->description)) !!}
                </div>

                <div class="flex items-center justify-between border-t pt-4">
                    <span class="text-sm text-gray-500">
                        Created: {{ $csr->created_at->format('M d, Y') }}
                    </span>
                    <div class="flex space-x-4">
                        <a class="text-blue-500 hover:text-blue-700"
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
        </div>

        <div class="mt-6">
            <a class="text-blue-500 hover:text-blue-700" href="{{ route('admin.csrs.index') }}">&larr; Back to all CSR
                Activities</a>
        </div>
    </div>
@endsection
