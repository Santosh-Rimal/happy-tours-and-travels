@extends('layouts.frontend.single.master1')

@section('content')

    <section class="w-full pt-[25px] md:pt-[58px]">
        <div class="relative overflow-hidden">
            <img class="w-full h-auto md:h-[500px] object-cover object-center"
                src="{{ asset('storage/' . $tripdetail->sliderimage) }}" alt="sliderIMage" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8 md:pb-16">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">
                    Welcome to Our Site
                </h2>
                <p class="text-lg md:text-xl text-gray-200 max-w-2xl">
                    {{ $tripdetail->trip_name }}
                </p>
            </div>
        </div>

    </section>

    <!-- Secondary Navbar (Becomes sticky below main header) -->
    <div class="secondary-nav bg-gray-800 w-full relative transition-all duration-300" id="secondary-nav">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex items-center overflow-x-auto py-2 hide-scrollbar">
                    <div class="flex space-x-1 md:space-x-4">
                        <a class="whitespace-nowrap px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-700 transition-colors duration-200"
                            href="#overview">OVERVIEW</a>
                        <a class="whitespace-nowrap px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 transition-colors duration-200"
                            href="#itenary">ITINERARY</a>
                        <a class="whitespace-nowrap px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 transition-colors duration-200"
                            href="#expect">WHAT
                            TO EXPECT</a>
                        <a class="whitespace-nowrap px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 transition-colors duration-200"
                            href="#useful-info">USEFUL
                            INFO</a>
                        <a class="whitespace-nowrap px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 transition-colors duration-200"
                            href="#">Section
                            5</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="h-auto w-full bg-gray-200 ">
        <div class="max-w-7xl mx-auto  flex flex-col md:flex-row justify-start md:justify-between gap-4 mt-10 items-center">
            <!-- Column 1 -->
            <div class="">
                <button class="bg-red-800 px-4 py-2 text-white font-bold m-3 text-sm">
                    TRIP DETAILS</button><br />
                <p class="m-3">
                    <span class="font-bold text-gray-700">Trip Name: </span><span
                        class="text-gray-700">{{ $tripdetail->trip_name }}</span>
                </p>
                <hr class="text-gray-400" />
                <p class="m-3">
                    <span class="font-bold text-gray-700">Destinations: </span><span
                        class="text-gray-700">{{ $tripdetail->destination }}</span>
                </p>

                <p class="m-3">
                    <span class="font-bold text-gray-700">Trip Price: </span><span
                        class="text-gray-700">{{ $tripdetail->trip_price }}</span>
                </p>

                <hr class="text-gray-400" />
                <p class="m-3">
                    <span class="font-bold text-gray-700">Trip Style: </span><span
                        class="text-gray-700">{{ $tripdetail->trip_style }}</span>
                </p>

                <hr class="text-gray-400" />
                <p class="m-3">
                    <span class="font-bold text-gray-700">Trip Duration: </span><span
                        class="text-gray-700">{{ $tripdetail->trip_duration }}</span>
                </p>

                <hr class="text-gray-400" />
                <p class="m-3">
                    <span class="font-bold text-gray-700">Food: </span><span
                        class="text-gray-700">{{ $tripdetail->food }}</span>
                </p>

                <hr class="text-gray-400" />
                <p class="m-3">
                    <span class="font-bold text-gray-700">Group Size: </span><span
                        class="text-gray-700">{{ $tripdetail->group_size }}</span>
                </p>
                <hr class="text-gray-400" />
            </div>
            <!-- Column 2 -->
            <div class="text-gray-700 mt-4 md:mt-3 ">
                <p class="m-3 text-start">
                    <span class="font-bold">Trip Difficulty: </span><span>{{ $tripdetail->trip_difficulty }}</span>
                </p>

                <hr class="text-gray-400" />
                <p class="m-3">
                    <span class="font-bold">Transport: </span><span>{{ $tripdetail->transportation }}</span>
                </p>

                <hr class="text-gray-400" />
                <p class="m-3">
                    <span class="font-bold">Accommodation: </span><span>{{ $tripdetail->accommodation }}</span>
                </p>

                <hr class="text-gray-400" />
                <p class="m-3">
                    <span class="font-bold">Max Elevation: </span><span> {{ $tripdetail->max_elevation }}</span>
                </p>
                <hr class="text-gray-400" />
            </div>

            <!-- Column 3 -->
            <div class="bg-white p-4 w-[400px] flex flex-col items-center justify-center">
                <p class="text-gray-700 font-semibold">Price from</p>
                <div class="text-blue-900 font-bold text-[23px]">
                    US$ 144
                    <span class="line-through text-gray-500 text-[18px]">US$ 198</span>
                </div>
                <p class="text-gray-700 mb-4">All Inclusive Per Person</p>

                <div class="text-blue-900 font-bold text-[20px] mb-2">
                    Why Book With Us?
                </div>
                <ul
                    class="text-gray-700 font-semibold list-disc list-inside flex flex-col items-start justify-center ml-16 md:ml-0">
                    <li>Serving since 1995</li>
                    <li>Run by local experts</li>
                    <li>9% of our profit goes to Social Cause</li>
                    <li>100+ Managed Tours</li>
                    <li>No Hassle price guarantee</li>
                    <li>Repeating Customers</li>
                </ul>

                <div class="flex flex-col sm:flex-row gap-4 mt-4">

                    <a class="text-blue-700 border border-blue-500 font-semibold px-4 py-2 rounded hover:bg-blue-500 hover:cursor-pointer hover:text-white transition-colors duration-500"
                        href="{{ route('frontend.customize.trip.customize', $tripdetail->id) }}">
                        CUSTOMIZE TRIP
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="h-auto w-full bg-white ">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-4 mt-10 items-center md:items-start justify-center">
            <!-- Column 1 -->
            <div class="text-gray-700 flex-[2]">
                @if ($tripdetail->highlights)
                    <div class="px-4 py-6">
                        <h2 class="text-2xl font-semibold mb-4">Highlights</h2>
                        @forelse ($tripdetail->highlights as $key=>$highlights)
                            <ul class="space-y-3">
                                @forelse($highlights->highlights as $key=>$highlight)
                                    <li class="flex items-start gap-2">
                                        <span class="text-blue-500" />➜</span>
                                        <p>
                                            {{ $highlight }}
                                        </p>
                                    </li>
                                @empty
                                @endforelse

                            </ul>
                        @empty
                        @endforelse
                    </div>
                @endif
                @if ($tripdetail->aboutTrip)
                    <div class="px-4 py-6" id="overview">
                        @forelse ($tripdetail->aboutTrip as $key=> $abouttrip)
                            <h2 class="text-3xl font-bold mb-4">
                                {{ $abouttrip->title }}
                            </h2>
                            <p class="space-y-3">
                                {!! $abouttrip->trip_description !!}
                            </p>
                        @empty
                        @endforelse

                    </div>
                @endif

                <!-- Itinerary -->
                @if ($tripdetail->itineray)
                    <div class="px-4 py-6" id="itenary">
                        <h2 class="text-[24px] font-bold">Itinerary</h2>

                        @forelse ($tripdetail->itineray as $key=>$itineray)
                            <div class="itinerary-block">
                                <div class="flex items-center justify-between mt-4 space-x-4">
                                    <div class="flex items-center gap-2">
                                        <span>📍</span>
                                        <span class="text-blue-400 text-base font-semibold flex">
                                            <p class="ml-1">{{ $itineray->title }}</p>
                                    </div>
                                    <span class="text-2xl icon cursor-pointer toggle-btn px-10"
                                        onclick="toggleDetails(this)">+</span>
                                </div>
                                <div class="mt-2 ml-8  hidden text-gray-600 toggle-content">
                                    {{ $itineray->description }}
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                @endif

                <!-- What's Included -->
                <div class="px-4 py-6" id="expect" id="whats-included">
                    <h2 class="text-[24px] font-bold">What's Included</h2>

                    @if ($tripdetail->includes)
                        <div class="itinerary-block">
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center gap-2 space-x-6">
                                    <span class="toggle-icon cursor-pointer text-2xl font-bold">+</span>
                                    <span class="text-blue-400 text-base font-semibold flex">Included</span>
                                </div>
                            </div>
                            @forelse ($tripdetail->includes as $key=>$includes)
                                <div class="mt-2 ml-10 hidden text-gray-600 toggle-content">
                                    <ul>
                                        @forelse ($includes->includes as $key=>$include)
                                            <li>
                                                - {{ $include }}
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>

                            @empty
                            @endforelse
                        </div>
                    @endif

                    @if ($tripdetail->notincludes)
                        <div class="itinerary-block" id="itenary">
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center gap-2 space-x-6">
                                    <span class="toggle-icon cursor-pointer text-2xl font-bold">+</span>
                                    <span class="text-blue-400 text-base font-semibold flex">Not Included</span>
                                </div>
                            </div>
                            @forelse ($tripdetail->notincludes as $key=>$notincludes)
                                <div class="mt-2 ml-10  hidden text-gray-600 toggle-content">
                                    <ul>
                                        @forelse ($notincludes->notincludes as $key=>$notinclude)
                                            <li>
                                                -{{ $notinclude }}
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    @endif
                </div>
                @if ($tripdetail->usefilinformation)
                    <div class="px-4 py-6" id="useful-info">
                        <h2 class="text-2xl font-semibold mb-4">Useful Information</h2>
                        <ul class="space-y-3">
                            @forelse ($tripdetail->usefilinformation as $usefilinfo)
                                <li class="flex items-start gap-2">
                                    {{-- <span class="text-blue-500">⭐</span> --}}
                                    <p class="">

                                        <strong>{{ $usefilinfo->title }}</strong> –
                                        {!! $usefilinfo->description !!}

                                    </p>
                                </li>
                            @empty
                                <li>No useful information available.</li>
                            @endforelse
                        </ul>
                    </div>
                @endif

            </div>

            <!-- Column 2 -->
            <div class="bg-blue-300 p-4 w-[400px] flex flex-col items-center justify-center">
                <div class="">
                    <h2 class="font-bold text-[20px] text-start text-[#1f398e]">How Can I Help You?</h2>
                    <div class="flex gap-6 mt-4">
                        <div class="w-[150px] h-[150px] bg-green-300">
                            <img class="w-full h-full object-center object-cover rounded-md"
                                src="https://images.unsplash.com/photo-1745933115134-9cd90e3efcc7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwxM3x8fGVufDB8fHx8fA%3D%3D"
                                alt="hdjdj">
                        </div>

                        <div class="flex flex-col items-start">
                            <h2 class="mt-1 text-[20px] font-bold text-[#1f398e]">Hari Pathak</h2>
                            <p class="text-base font-normal text-black">Operation Manager</p>

                            <h2 class="mt-4 text-base font-bold text-[#1f398e]">+977 9876550033</h2>
                            <p class="text-base font-normal text-black">Call, Viber & WhatsApp </p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-center justify-center mt-10 py-8 px-3 bg-white">
                    <h2 class="mx-2 bg-white shadow-xl px-8 py-2 mt-[-50px] text-[#1f398e] font-semibold text-base">SEND US
                        YOUR ENQUIRY</h2>
                    <p class="mt-8 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod atque
                        doloremque exercitationem labore asperiores consectetur unde necessitatibus, quasi explicabo
                        laboriosam!</p>
                </div>

            </div>

        </div>

    </div>

    @include('layouts.frontend.affiliatePartners')

    <script>
        // scroll is landing too far down, probably because the sticky header or navbar is overlapping the section. This is common when you have a fixed/sticky navbar. so to fix this we are using this js

        //Why this works?
        //It finds the clicked anchor's href

        //Measures the height of the sticky navbar

        //Scrolls to the section minus that offset

        //Smoothly scrolls without hiding the top part of the section

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                const target = document.querySelector(targetId);

                if (target) {
                    e.preventDefault();

                    // Measure offset height of your sticky header (adjust if needed)
                    const headerOffset = document.getElementById('secondary-nav')?.offsetHeight || 80;

                    const elementPosition = target.getBoundingClientRect().top + window.scrollY;
                    const offsetPosition = elementPosition - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });

                    // Optionally, update URL hash without jumping
                    history.pushState(null, null, targetId);
                }
            });
        });
    </script>

@endsection
