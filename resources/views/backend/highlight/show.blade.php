@extends('layouts.backend.master')

@section('linksscript')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-10">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Trip Highlights</h1>
            </div>
            <a class="flex items-center text-gray-500 font-medium hover:text-blue-700 transition"
                href="{{ route('admin.highlights.index') }}">
                <i class="fas fa-arrow-left mr-2"></i> Back
            </a>
        </div>

        <!-- Trip Name -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Trip Name</h2>
            <p class="text-gray-600 mt-2">{{ $highlight->tripDetail->trip_name }}</p>
        </div>

        <!-- Highlights -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Highlights</h2>
            @if (is_array($highlight->highlights) && count($highlight->highlights))
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    @foreach ($highlight->highlights as $point)
                        <li>{{ $point }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No highlights available for this trip.</p>
            @endif
        </div>
    </div>
@endsection
