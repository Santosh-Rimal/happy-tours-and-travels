@extends('layouts.backend.master')

@section('content')
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-xl p-8">
            <h1 class="text-3xl font-bold text-blue-700 mb-6">{{ $tripdetail->trip_name }}</h1>

            @if ($tripdetail->sliderimage)
                <div class="mb-6">
                    <img class="w-full h-64 object-cover rounded-lg shadow"
                        src="{{ asset('storage/' . $tripdetail->sliderimage) }}" alt="Trip Image">
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">

                <div>
                    <p class="font-semibold">Destination:</p>
                    <p>{{ $tripdetail->destination }}</p>
                </div>

                <div>
                    <p class="font-semibold">Trip Style (Date):</p>
                    <p>{{ $tripdetail->trip_style }}</p>
                </div>

                <div>
                    <p class="font-semibold">Food:</p>
                    <p>{{ $tripdetail->food }}</p>
                </div>

                <div>
                    <p class="font-semibold">Transportation:</p>
                    <p>{{ $tripdetail->transportation }}</p>
                </div>

                <div>
                    <p class="font-semibold">Accommodation:</p>
                    <p>{{ $tripdetail->accommodation }}</p>
                </div>

                <div>
                    <p class="font-semibold">Group Size:</p>
                    <p>{{ $tripdetail->group_size }}</p>
                </div>

                <div>
                    <p class="font-semibold">Trip Duration:</p>
                    <p>{{ $tripdetail->trip_duration }}</p>
                </div>

                <div>
                    <p class="font-semibold">Trip Difficulty:</p>
                    <p>{{ $tripdetail->trip_difficulty }}</p>
                </div>

                <div>
                    <p class="font-semibold">Trip Price:</p>
                    <p class="text-green-600 font-bold text-lg">${{ $tripdetail->trip_price }}</p>
                </div>

                <div>
                    <p class="font-semibold">Max Elevation:</p>
                    <p>{{ $tripdetail->max_elevation }}</p>
                </div>

            </div>

            <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Trip Description:</h2>
                <p class="text-gray-600 leading-relaxed">
                    {{ $tripdetail->trip_description }}
                </p>
            </div>

            <div class="mt-8">
                <a class="inline-block bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition duration-200"
                    href="{{ route('admin.tripdetails.index') }}">Back to Trips</a>
            </div>
        </div>
    </div>
@endsection
