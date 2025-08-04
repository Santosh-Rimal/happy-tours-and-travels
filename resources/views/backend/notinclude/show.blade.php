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

        .include-item {
            position: relative;
            padding-left: 32px;
            margin-bottom: 12px;
        }

        .include-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 8px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3B82F6, #8B5CF6);
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

        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .difficulty-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
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
                <h1 class="text-3xl font-bold text-gray-900">Trip Not Inclusion</h1>
                <p class="text-gray-600 mt-1">Explore trip Not Inclusion</p>
            </div>
            <a class="flex items-center  text-gray-500 font-medium hover:text-blue-700 transition"
                href="{{ route('admin.notincludes.index') }}">
                <i class="fas fa-arrow-left mr-2"></i> Back
            </a>
        </div>

        <!-- Trip Information Card -->
        <div class="section-card p-6 mb-8">

            <div class="space-y-1">
                <div class="info-item">
                    <div class="w-40 text-gray-500 font-medium">Name</div>
                    <div class="flex-1 font-medium  text-gray-500">{{ $notinclude->tripDetail->trip_name }}</div>
                </div>
                <div class="info-item">
                    <div class="w-40 text-gray-500 font-medium">Destination</div>
                    <div class="flex-1 font-medium text-gray-500">{{ $notinclude->tripDetail->destination }}</div>
                </div>
                <div class="info-item">
                    <div class="w-40 text-gray-500 font-medium">Style</div>
                    <div class="flex-1">
                        <span
                            class="badge bg-blue-100 text-primary  text-gray-500">{{ $notinclude->tripDetail->trip_style }}</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="w-40 text-gray-500 font-medium">Duration</div>
                    <div class="flex-1 font-medium  text-gray-500">{{ $notinclude->tripDetail->trip_duration }}</div>
                </div>
                <div class="info-item">
                    <div class="w-40 text-gray-500 font-medium">Difficulty</div>
                    <div class="flex-1">
                        <span
                            class="difficulty-badge bg-purple-100 text-accent  text-gray-500">{{ $notinclude->tripDetail->trip_difficulty }}</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="w-40 text-gray-500 font-medium">Group Size</div>
                    <div class="flex-1 font-medium  text-gray-500">{{ $notinclude->tripDetail->group_size }}</div>
                </div>
                <div class="info-item">
                    <div class="w-40 text-gray-500 font-medium">Price</div>
                    <div class="flex-1">
                        <span class="price-tag">${{ number_format($notinclude->tripDetail->trip_price, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- notincludes Card -->
        <div class="section-card p-6 mb-8">
            <div class="flex items-center mb-6">
                <div class="header-icon mr-4">
                    <i class="fas fa-star text-white text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900">notincludes</h2>
                    <p class="text-gray-600">Key features of this adventure experience</p>
                </div>
            </div>

            @if (is_array($notinclude->notincludes) && count($notinclude->notincludes))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($notinclude->notincludes as $point)
                        <div class="include-item">
                            <h3 class="font-semibold text-gray-900">{{ $point }}</h3>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-exclamation-circle text-gray-300 text-4xl mb-4"></i>
                    <p class="text-gray-500">No notincludes available for this trip</p>
                </div>
            @endif
        </div>

        <!-- Description Card -->
        <div class="section-card p-6">
            <div class="flex items-center mb-6">
                <div class="header-icon mr-4">
                    <i class="fas fa-book-open text-white text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Trip Description</h2>
                    <p class="text-gray-600">Detailed overview of this adventure</p>
                </div>
            </div>

            <div class="prose max-w-none">
                <p class="text-gray-700 mb-4 leading-relaxed">
                    {{ $notinclude->tripDetail->trip_description }}
                </p>
            </div>
        </div>
    </div>

@endsection
