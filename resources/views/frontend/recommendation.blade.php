@extends('layouts.frontend.master')

@section('content')
    <div class="pt-[93px] md:pt-[123px] relative">
        <div class="swiper w-full h-[300px] md:h-[calc(100vh-93px)]">
            <div class="swiper-wrapper">
                @forelse ($herosections as $key=>$herosection)
                    <!-- Slide 1 -->
                    <div class="swiper-slide relative">
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $herosection->heroimage) }}"
                            alt="Slide 1" />
                        <div
                            class="absolute inset-0 bg-black/40 flex items-center justify-center text-white text-center px-4">
                            <p class="text-lg sm:text-2xl md:text-4xl font-semibold max-w-3xl mx-auto">
                                {{ $herosection->herotitle }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p
                        class="flex w-full items-center justify-center h-[300px] md:h-[calc(100vh-93px)] text-red-500 font-bold text-2xl">
                        Sorry No Data Found</p>
                @endforelse
            </div>

            <!-- Swiper Navigation and Pagination -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto pt-20">
        <h2 class="text-2xl md:text-4xl text-center md:text-start font-normal">
            Explore by <span class="text-black text-3xl md:text-5xl font-bold">
                @foreach ($tripdetails as $key => $tripdetail)
                    {{ $tripdetail->herotitle }}
                @endforeach
            </span>
        </h2>
        <div class="mt-10 pb-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 place-items-center">
            @forelse ($tripdetails as $key=>$tripdetail)
                <a class="group flex flex-col w-[320px] h-[500px] shadow-2xl cursor-pointer transform transition duration-300 hover:scale-105"
                    href="{{ route('frontend.trip.show', $tripdetail->trip_slug) }}">
                    <div class="w-full h-[280px] overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-115"
                            src="{{ asset('storage/' . $tripdetail->sliderimage) }}" alt="" />
                    </div>
                    <h2 class="font-bold text-[20px] pt-8 px-6 transition-colors duration-300 group-hover:text-blue-400">
                        {{ $tripdetail->trip_name }}
                    </h2>
                    <hr class="text-gray-500 text-2xl mt-6 mb-4 mx-6" />
                    <div class="flex mt-4 space-x-6 px-6 items-center">
                        <img class="rounded-full w-[60px] h-[60px]" src="{{ asset('storage/' . $tripdetail->sliderimage) }}"
                            alt="hgf" />
                        <div class="flex flex-col">
                            <p class="text-base font-normal text-gray-700">Duration</p>
                            <p class="text-[22px] text-blue-400 font-bold"> {{ $tripdetail->trip_duration }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <p>No data found</p>
            @endforelse
        </div>

    </div>

    <!-- Welcome -->

    <div class="w-full h-auto flex justify-center items-center py-12 bg-[#03578C] text-white">
        <div class="max-w-6xl flex flex-col md:flex-row justify-between items-center gap-10 px-6">
            <!-- Left Section -->
            <div class="flex-1">
                <h1 class="text-white text-[16px]">Welcome to</h1>
                <h1 class="text-white text-[32px] font-bold">
                    Himalayan Ecological Trekking
                </h1>

                <p class="text-white mt-2">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio
                    assumenda quidem eaque voluptate doloribus est illum molestiae,
                    itaque, quisquam nemo, nobis ullam dolor modi fugit doloremque
                    quaerat.
                </p>

                <div class="readmore-content mt-2 text-white text-sm">
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Distinctio assumenda quidem eaque voluptate doloribus est illum
                        molestiae, itaque, quisquam nemo, nobis ullam dolor modi fugit
                        doloremque quaerat. Lorem ipsum dolor sit amet consectetur,
                        adipisicing elit. Distinctio assumenda quidem eaque voluptate
                        doloribus est illum molestiae, itaque, quisquam nemo, nobis ullam
                        dolor modi fugit doloremque quaerat. Lorem ipsum dolor sit amet
                        consectetur, adipisicing elit. Distinctio assumenda quidem eaque
                        voluptate doloribus est illum molestiae, itaque, quisquam nemo,
                        nobis ullam dolor modi fugit doloremque quaerat.
                    </p>
                </div>

                <button
                    class="mt-4 bg-[#F59E0B] px-4 py-2 rounded-md text-white cursor-pointer hover:bg-yellow-800 transition duration-300"
                    id="readmore-btn">
                    Read more +
                </button>
            </div>

            <!-- Right Section -->
            <div class="flex-1">
                <h1 class="text-[24px] text-white font-extrabold mb-4">
                    Why trekking with us?
                </h1>

                <div class="space-y-4">
                    <!-- Accordion Items -->
                    <div class="border-b border-white pb-3">
                        <button class="w-full flex justify-between items-center text-left accordion-toggle">
                            <span class="text-lg font-bold">Full Customized Trips</span>
                            <span class="text-2xl icon cursor-pointer">+</span>
                        </button>
                        <div class="accordion-content mt-2 text-sm">
                            <div class="py-2">
                                We provide fully personalized trekking experiences tailored to
                                your preferences and pace.
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-white pb-3">
                        <button class="w-full flex justify-between items-center text-left accordion-toggle">
                            <span class="text-lg font-bold">100+ Managed Tours</span>
                            <span class="text-2xl icon cursor-pointer">+</span>
                        </button>
                        <div class="accordion-content mt-2 text-sm">
                            <div class="py-2">
                                Explore a wide range of professionally managed tours designed
                                for all levels of trekkers.
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-white pb-3">
                        <button class="w-full flex justify-between items-center text-left accordion-toggle">
                            <span class="text-lg font-bold">Run by local Operators</span>
                            <span class="text-2xl icon cursor-pointer">+</span>
                        </button>
                        <div class="accordion-content mt-2 text-sm">
                            <div class="py-2">
                                Our tours are operated by local experts, ensuring authenticity
                                and community support.
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-white pb-3">
                        <button class="w-full flex justify-between items-center text-left accordion-toggle">
                            <span class="text-lg font-bold">Serving Since 1995</span>
                            <span class="text-2xl icon cursor-pointer">+</span>
                        </button>
                        <div class="accordion-content mt-2 text-sm">
                            <div class="py-2">
                                With over 25 years of experience, we are a trusted name in
                                trekking adventures.
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-white pb-3">
                        <button class="w-full flex justify-between items-center text-left accordion-toggle">
                            <span class="text-lg font-bold">Crowd Escape Trips</span>
                            <span class="text-2xl icon cursor-pointer">+</span>
                        </button>
                        <div class="accordion-content mt-2 text-sm">
                            <div class="py-2">
                                Discover peaceful paths away from the crowds for a truly
                                serene trekking experience.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Articles and Travel Tips -->

    {{-- <div class="max-w-6xl mx-auto pt-20">
        <h2 class="text-2xl md:text-4xl text-center md:text-start font-normal">Articles and Travel Tips</h2>

        <div class="mt-10 pb-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 place-items-center">
            <div
                class="group flex flex-col w-[320px] h-[500px] shadow-2xl cursor-pointer transform transition duration-300 hover:scale-105">
                <div class="w-full h-[280px] overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-115"
                        src="{{ asset('images/Hero2.jpeg') }}" alt="" />
                </div>
                <h2 class="font-bold text-[20px] pt-8 px-6 transition-colors duration-300 group-hover:text-blue-400">
                    Great Himalayan Trail
                </h2>
                <hr class="text-gray-500 text-2xl mt-6 mb-4 mx-6" />
                <div class="flex mt-4 space-x-6 px-6 items-center">
                    <img class="rounded-full w-[60px] h-[60px]" src="{{ asset('images/Hero2.jpeg') }}" alt="hgf" />
                    <div class="flex flex-col">
                        <p class="text-base font-normal text-gray-700">Duration</p>
                        <p class="text-[22px] text-blue-400 font-bold">154 Days</p>
                    </div>
                </div>
            </div>

            <div
                class="group flex flex-col w-[320px] h-[500px] shadow-2xl cursor-pointer transform transition duration-300 hover:scale-105">
                <div class="w-full h-[280px] overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-115"
                        src="{{ asset('images/Hero3.jpeg') }}" alt="" />
                </div>
                <h2 class="font-bold text-[20px] pt-8 px-6 transition-colors duration-300 group-hover:text-blue-400">
                    Great Himalayan Trail
                </h2>
                <hr class="text-gray-500 text-2xl mt-6 mb-4 mx-6" />
                <div class="flex mt-4 space-x-6 px-6 items-center">
                    <img class="rounded-full w-[60px] h-[60px]" src="{{ asset('images/Hero2.jpeg') }}" alt="hgf" />
                    <div class="flex flex-col">
                        <p class="text-base font-normal text-gray-700">Duration</p>
                        <p class="text-[22px] text-blue-400 font-bold">154 Days</p>
                    </div>
                </div>
            </div>

            <div
                class="group flex flex-col w-[320px] h-[500px] shadow-2xl cursor-pointer transform transition duration-300 hover:scale-105">
                <div class="w-full h-[280px] overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-115"
                        src="{{ asset('images/Hero1.jpeg') }}" alt="" />
                </div>
                <h2 class="font-bold text-[20px] pt-8 px-6 transition-colors duration-300 group-hover:text-blue-400">
                    Great Himalayan Trail
                </h2>
                <hr class="text-gray-500 text-2xl mt-6 mb-4 mx-6" />
                <div class="flex mt-4 space-x-6 px-6 items-center">
                    <img class="rounded-full w-[60px] h-[60px]" src="{{ asset('images/Hero2.jpeg') }}" alt="hgf" />
                    <div class="flex flex-col">
                        <p class="text-base font-normal text-gray-700">Duration</p>
                        <p class="text-[22px] text-blue-400 font-bold">154 Days</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @include('layouts.frontend.affiliatePartners')

    {{-- Blogs Section  --}}

    <div class="container  mt-[140px] max-w-6xl mx-auto px-6 mb-10">
        <div class="flex items-center justify-between ">
            <h2 class="text-2xl md:text-4xl text-center md:text-start font-normal">Blogs</h2>
            <a class=" bg-blue-500 hover:bg-blue-900 px-4 py-4 rounded-lg cursor-pointer hover:text-white text-gray-900 text-base"
                href="{{ route('frontend.blogs') }}">Explore
                All</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10 md:mt-20 place-items-center">
            @foreach ($blogs as $blog)
                <div
                    class="group flex flex-col w-[320px] h-[500px] shadow-2xl cursor-pointer transform transition duration-300 hover:scale-105">
                    @if ($blog->image)
                        <div class="w-full h-[280px] overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-115"
                                src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" />
                        </div>
                        {{-- <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}" class="rounded mb-4 h-48 w-full object-cover"> --}}
                    @endif
                    <h2 class="font-bold text-[20px] pt-8 px-6 transition-colors duration-300 group-hover:text-blue-400 ">
                        {{ $blog->title }}</h2>
                    <div class="text-gray-600 text-sm mb-2 px-6 transitions-colors duration-300 mt-3">
                        {{ $blog->created_at->format('M d, Y') }}</div>
                    <div class="mb-4 px-6">{{ Str::limit(strip_tags($blog->content), 120) }}</div>
                    <hr class="text-gray-500 text-2xl mt-2 mb-2 mx-6" />
                    <a class="text-blue-600 font-medium hover:text-blue-800 transition-colors duration-200 px-6 mt-2 pb-2"
                        href="{{ route('frontend.blogs.show', $blog->slug) }}">
                        Read More →
                    </a>

                </div>
            @endforeach
        </div>

    </div>

    {{-- Gallery Section --}}

    @include('layouts.frontend.indexgallery')

    {{-- Footer Section --}}
@endsection
