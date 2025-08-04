@extends('layouts.backend.master')

@section('linksscript')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#10B981',
                        accent: '#8B5CF6',
                        dark: '#1F2937',
                        light: '#F9FAFB'
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
@endsection

@push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            background-color: #f5f7fa;
            background-image: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            min-height: 100vh;
        }

        .section-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .trip-image {
            max-height: 300px;
            object-fit: cover;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
    </style>
@endpush

@section('content')
    <div class="max-w-3xl mx-auto px-4">
        <div class="section-card">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $abouttrip->tripDetail->trip_name }}</h1>
            <h2 class="text-xl text-gray-700 mb-4">{{ $abouttrip->title }}</h2>

            @if ($abouttrip->image)
                <img class="trip-image w-full" src="{{ asset('storage/' . $abouttrip->image) }}" alt="Trip Image">
            @endif

            <div class="prose max-w-none text-gray-800">
                {!! $abouttrip->trip_description !!}
            </div>
        </div>
    </div>
@endsection
