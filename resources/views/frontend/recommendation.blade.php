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


   

    @include('layouts.frontend.affiliatePartners')

   

    {{-- Footer Section --}}
@endsection
