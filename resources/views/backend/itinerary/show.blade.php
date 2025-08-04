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

        .header-gradient {
            background: linear-gradient(135deg, #3B82F6, #8B5CF6);
        }

        .section-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .section-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .info-item {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .header-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: linear-gradient(135deg, #3B82F6, #8B5CF6);
        }

        .price-tag {
            background: linear-gradient(135deg, #10B981, #3B82F6);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 700;
        }
    </style>
@endpush

@section('content')
    <div class="max-w-4xl mx-auto px-4">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Itinerary Details</h1>
                <p class="text-gray-600 mt-1">Explore trip Itineraries</p>
            </div>
            <a class="flex items-center text-gray-500 font-medium hover:text-blue-700 transition"
                href="{{ route('admin.itineraries.index') }}">
                <i class="fas fa-arrow-left mr-2"></i> Back
            </a>
        </div>

        <!-- Trip Information Card -->
        <div class="section-card p-6 mb-8">
            <div class="info-item">
                <div class="w-40 text-gray-500 font-medium">Name</div>
                <div class="flex-1 font-medium text-gray-500">{{ $itinerary->tripDetail->trip_name }}</div>
            </div>
        </div>

        <!-- Highlights Card -->
        <div class="section-card p-6 mb-8">
            <div class="flex items-center mb-6">
                <div class="header-icon mr-4">
                    <i class="fas fa-star text-white text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Trip Itinerary</h2>
                    <p class="text-gray-600">{{ $itinerary->title }}</p>
                </div>
            </div>
        </div>

        <!-- Description Card -->
        <div class="section-card p-6">
            <div class="flex items-center mb-6">
                <div class="header-icon mr-4">
                    <i class="fas fa-book-open text-white text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Description</h2>
            </div>
            <div class="prose max-w-none">
                <p class="text-gray-700 mb-4 leading-relaxed">
                    {{ $itinerary->description }}
                </p>
            </div>
        </div>
    </div>
@endsection
