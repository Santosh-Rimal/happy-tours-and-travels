@extends('layouts.frontend.master')

@section('content')
    <div class="container mx-auto px-4 py-16 sm:py-20 mt-24 max-w-6xl">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-10 sm:mb-12 text-center text-gray-900 leading-tight">
            Corporate Social Responsibility (CSR)
        </h1>

        <div class="space-y-12 text-gray-700 leading-relaxed text-base sm:text-lg">
            <p class="text-justify">
                At <strong class="text-black">YourCompany</strong>, we believe in doing business responsibly and giving back
                to the communities in which we operate. Our CSR initiatives reflect our commitment to social, environmental,
                and economic sustainability.
            </p>
            @foreach ($corporates as $corporate)
                <!-- Environmental Responsibility -->
                <section>
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4">{{ $corporate->title ?? '' }}</h2>
                    <p>
                        {{ $corporate->description ?? '' }}
                    </p>
                </section>
            @endforeach

            <!-- Recent CSR Activities -->
            <section>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-12 mb-6 text-center">📸 Recent CSR Activities
                </h2>
                @foreach ($csrs as $csr)
                    <!-- Activity 1 -->
                    <div class="bg-white rounded-xl overflow-hidden mb-10 ">
                        <img class="w-full h-52 sm:h-64 object-cover" src="{{ $csr->image }}" alt="School Renovation">
                        <div class="p-4 sm:p-6">
                            <h3 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-2">{{ $csr->title ?? '' }}</h3>
                            <p>
                                {{ $csr->description ?? '' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </section>

            <!-- Get Involved -->
            <section class="mt-16 bg-blue-50 p-4 sm:p-6 rounded-xl shadow">
                <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-3">📬 Get Involved</h2>
                <p class="mb-2">
                    Are you passionate about making a difference? We welcome volunteers, NGOs, and partners to collaborate
                    with us.
                </p>
                <p>
                    Reach out via our
                    <a class="text-blue-600 font-medium underline hover:text-blue-800" href="/contact">contact page</a>
                    to learn how we can work together.
                </p>
            </section>
        </div>
    </div>
@endsection
