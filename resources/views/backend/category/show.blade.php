@extends('layouts.backend.master')

@section('title', 'Category Details')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow p-6 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Category Details</h2>

        <div class="text-white">
            <p><strong>Name:</strong> {{ $category->name }}</p>
        </div>

        <div class="mt-6">
            <a class="text-blue-400 hover:underline" href="{{ route('admin.categories.index') }}">← Back to List</a>
        </div>
    </div>
@endsection
