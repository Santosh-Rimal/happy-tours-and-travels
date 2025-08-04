@extends('layouts.frontend.master')

@section('content')
    <section class="py-16 bg-white mt-[120px]">
        <div class="container mx-auto px-6 md:px-12">

            @foreach ($abouts as $about)
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">{{ $about->page_title ?? '' }}</h2>
                    <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
                    <p class="text-lg text-gray-600 mt-4 max-w-2xl mx-auto">
                        {{ $about->page_subtitle ?? '' }}
                    </p>
                </div>

                <!-- Content Grid -->
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <!-- Image Column -->
                    <div class="lg:w-1/2">
                        <div class="relative rounded-xl overflow-hidden shadow-xl">
                            <img class="w-full h-auto object-cover"
                                src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4" alt="Himalayan Trekking">
                            <div class="absolute inset-0 bg-blue-500 opacity-20"></div>
                        </div>
                    </div>

                    <!-- Text Column -->
                    <div class="lg:w-1/2">

                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Journey</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Founded in Kathmandu with a passion for showcasing Nepal's breathtaking beauty, Hamro Tours and
                            Travel has grown from a small local operator to a premier travel company offering curated
                            experiences across the Himalayas, cultural tours, jungle safaris, and adventure trips throughout
                            Nepal.
                        </p>

                        <div class="space-y-6">
                            @foreach ($about->sections as $section)
                                @if (isset($section['section_title']) && $section['section_title'])
                                    <!-- Mission -->
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 bg-blue-100 p-3 rounded-full mr-4">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-semibold text-gray-800 mb-2">
                                                {{ $section['section_title'] }}
                                            </h4>
                                            <p class="text-gray-600">{{ $section['section_content'] }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- Travel Stats -->

                        <div class="grid grid-cols-3 gap-4 mt-10">
                            @foreach ($about->sections as $section)
                                @if (isset($section['section_type']) && $section['section_type'] === 'stats')
                                    <div class="text-center p-4 border border-gray-200 rounded-lg">
                                        <div class="text-3xl font-bold text-blue-600 mb-2">
                                            {{ $section['stat_value'] ?? '0' }}
                                        </div>
                                        <div class="text-gray-600">{{ $section['stat_label'] ?? '0' }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Team Section -->
            <div class="mt-24">
                <h3 class="text-3xl font-bold text-center text-gray-800 mb-12">Meet Our Expert Guides</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($teamMembers as $team)
                        <!-- Guide 1 -->

                        <div class="text-center">
                            <div
                                class="w-48 h-48 mx-auto mb-6 overflow-hidden rounded-full shadow-lg border-4 border-white">
                                <img class="w-full h-full object-cover" src="{{ $team->image_url }}" alt="Trekking Guide">
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800">{{ $team->name ?? '0' }}</h4>
                            <p class="text-blue-600 mb-2">{{ $team->position ?? '0' }}</p>
                            <p class="text-gray-600 px-4">{{ $team->description ?? '0' }}</p>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Why Choose Us -->
            <div class="mt-24 bg-blue-50 rounded-xl p-12">
                <h3 class="text-3xl font-bold text-center text-gray-800 mb-12">Why Travel With Hamro Tours?</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    @foreach ($features as $feature)
                        <div class="text-center p-6">
                            <div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $feature->icon_path }}">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $feature->title ?? '' }}</h4>
                            <p class="text-gray-600">
                                {{ $feature->description ?? '' }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
