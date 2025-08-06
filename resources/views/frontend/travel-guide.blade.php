@extends('layouts.frontend.master')

@section('content')
    <section class="py-12 bg-gray-50 mt-[93px] md:mt-[123px]">
        <div class="container mx-auto px-4 md:px-8">
            <!-- Hero Section -->
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Nepal Travel Guide</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Essential information and expert tips for your Himalayan adventure
                </p>
                <div class="w-24 h-1.5 bg-blue-600 mx-auto mt-6"></div>
            </div>

            <!-- Main Content Grid -->
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Navigation -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-xl shadow-md p-6 sticky top-[95px]">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Guide Sections</h3>
                        <ul class="space-y-3">
                            <li><a class="text-blue-600 hover:text-blue-800 flex items-center" href="#best-time">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Best Time to Visit</a></li>
                            <li><a class="text-blue-600 hover:text-blue-800 flex items-center" href="#visa-info">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Visa Information</a></li>
                            <li><a class="text-blue-600 hover:text-blue-800 flex items-center" href="#packing-list">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    Packing List</a></li>
                            <li><a class="text-blue-600 hover:text-blue-800 flex items-center" href="#altitude-sickness">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                    Altitude Sickness</a></li>
                            <li><a class="text-blue-600 hover:text-blue-800 flex items-center" href="#culture-etiquette">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Culture & Etiquette</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:w-3/4">
                    <!-- Best Time to Visit -->
                    <div class="bg-white rounded-xl shadow-md p-8 mb-8" id="best-time">
                        <div class="flex items-center mb-6">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">Best Time to Visit Nepal</h2>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">

                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">Peak Seasons</h3>
                                @foreach ($peak_seasons as $peak)
                                    <div class="space-y-4">
                                        <div class="p-4 bg-blue-50 rounded-lg">
                                            <h4 class="font-semibold text-blue-800">{{ $peak->name ?? '' }}
                                                ({{ $peak->months ?? '' }})
                                            </h4>
                                            <p class="text-gray-700 mt-1">{{ $peak->description ?? '' }}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">Other Seasons</h3>
                                @foreach ($other_seasons as $other)
                                    <div class="space-y-4">
                                        <div class="p-4 bg-gray-50 rounded-lg">
                                            <h4 class="font-semibold text-gray-800">{{ $other->name }}
                                                ({{ $other->months ?? '' }})
                                            </h4>
                                            <p class="text-gray-700 mt-1">{{ $other->description ?? '' }}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                        <div class="mt-8">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Monthly Weather Guide</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="py-3 px-4 text-left">Month</th>
                                            <th class="py-3 px-4 text-left">Kathmandu</th>
                                            <th class="py-3 px-4 text-left">Pokhara</th>
                                            <th class="py-3 px-4 text-left">Everest Region</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-3 px-4">January</td>
                                            <td class="py-3 px-4">10°C (50°F)</td>
                                            <td class="py-3 px-4">12°C (54°F)</td>
                                            <td class="py-3 px-4">-15°C (5°F)</td>
                                        </tr>
                                        <tr class="bg-gray-50">
                                            <td class="py-3 px-4">April</td>
                                            <td class="py-3 px-4">20°C (68°F)</td>
                                            <td class="py-3 px-4">22°C (72°F)</td>
                                            <td class="py-3 px-4">-5°C (23°F)</td>
                                        </tr>
                                        <!-- Add more months as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Visa Information -->
                    <div class="bg-white rounded-xl shadow-md p-8 mb-8" id="visa-info">
                        <div class="flex items-center mb-6">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">Nepal Visa Information</h2>
                        </div>

                        <div class="space-y-6">
                            @foreach ($visas as $visa)
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $visa->title ?? '' }}</h3>
                                    <p class="text-gray-700">{{ $visa->description ?? '' }}</p>
                                    <ul class="list-disc pl-5 mt-2 space-y-2 text-gray-700">
                                        @foreach ($visa->requirements as $required)
                                            <li>{{ $required ?? '' }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach

                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-yellow-700">
                                            <strong>Important:</strong> Some nationalities must obtain visas in advance.
                                            Check with your nearest Nepalese embassy before traveling.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Packing List -->
                    <div class="bg-white rounded-xl shadow-md p-8 mb-8" id="packing-list">
                        <div class="flex items-center mb-6">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">Trekking Packing List</h2>
                        </div>

                        <div class="grid md:grid-cols-2 gap-8">
                            @foreach ($TrekkingPackages as $TrekkingPackage)
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">
                                        {{ $TrekkingPackage->title ?? '' }}
                                    </h3>
                                    <ul class="space-y-3">
                                        @foreach ($TrekkingPackage->requirements as $required)
                                            <li class="flex items-start">
                                                <svg class="flex-shrink-0 h-5 w-5 text-green-500 mr-2" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700">{{ $required ?? '' }}</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8 bg-blue-50 rounded-lg p-6">
                            <h3 class="text-xl font-semibold text-blue-800 mb-3">Pro Tips from Our Guides</h3>
                            <ul class="list-disc pl-5 space-y-2 text-gray-700">
                                @foreach ($TrekkingPackages as $TrekkingPackage)
                                    @foreach ($TrekkingPackage->tips as $tip)
                                        <li>{{ $tip ?? '' }}</li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Altitude Sickness -->
                    <div class="bg-white rounded-xl shadow-md p-8 mb-8" id="altitude-sickness">
                        <div class="flex items-center mb-6">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">Altitude Sickness Prevention</h2>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">Symptoms to Watch For</h3>
                                <div class="grid sm:grid-cols-2 gap-4">
                                    @foreach ($symptoms as $symptom)
                                        <div class="bg-red-50 p-4 rounded-lg border-l-4 border-red-500">
                                            <h3 class="font-semibold text-red-800">{{ $symptom->title ?? '' }}</h3>
                                            <h4 class="font-semibold text-red-800">Mild Symptoms</h4>
                                            <ul class="list-disc pl-5 mt-2 space-y-1 text-gray-700">
                                                @foreach ($symptom->mild_symptoms as $mild)
                                                    <li>{{ $mild ?? '' }}</li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    @endforeach
                                    @foreach ($symptoms as $symptom)
                                        <div class="bg-red-100 p-4 rounded-lg border-l-4 border-red-700">
                                            <h4 class="font-semibold text-red-900">{{ $symptom->title }}</h4>
                                            <h4 class="font-semibold text-red-900">Severe Symptoms</h4>
                                            <ul class="list-disc pl-5 mt-2 space-y-1 text-gray-700">
                                                @foreach ($symptom->severe_symptoms as $severe)
                                                    <li>{{ $severe ?? '' }}</li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">Prevention Tips</h3>
                                <div class="grid md:grid-cols-3 gap-4">
                                    @foreach ($preventions as $prevention)
                                        <div class="bg-green-50 p-4 rounded-lg">
                                            <h4 class="font-semibold text-green-800">{{ $prevention->title ?? '' }}</h4>
                                            <p class="text-gray-700 mt-1">{{ $prevention->text ?? '' }}</p>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="bg-blue-50 rounded-lg p-6">
                                <h3 class="text-xl font-semibold text-blue-800 mb-3">Our Safety Measures</h3>
                                @foreach ($safties as $safty)
                                    <p class="mt-4 text-blue-700 mb-4">{{ $safty->title ?? '' }}:</p>
                                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                                        @foreach ($safty->requirements as $required)
                                            <li>{{ $required ?? '' }}</li>
                                        @endforeach

                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Culture & Etiquette -->
                    <div class="bg-white rounded-xl shadow-md p-8" id="culture-etiquette">
                        <div class="flex items-center mb-6">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">Nepali Culture & Etiquette</h2>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">Cultural Do's</h3>
                                <div class="grid sm:grid-cols-2 gap-4">
                                    @foreach ($culuturaldoes as $do)
                                        <div class="bg-green-50 p-4 rounded-lg">
                                            <h4 class="font-semibold text-green-800">{{ $do->title ?? '' }}</h4>
                                            <p class="text-gray-700 mt-1">{{ $do->what_do ?? '' }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">Cultural Don'ts</h3>
                                <div class="grid sm:grid-cols-2 gap-4">
                                    @foreach ($culuturaldoesnots as $donot)
                                        <div class="bg-red-50 p-4 rounded-lg">
                                            <h4 class="font-semibold text-red-800">{{ $donot->title ?? '' }}</h4>
                                            <p class="text-gray-700 mt-1">{{ $donot->what_donot ?? '' }}</p>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-yellow-700">
                                            <strong>Tip:</strong> Nepalis are generally very forgiving of cultural mistakes
                                            by foreigners, but making an effort to follow local customs will earn you
                                            respect and warmer interactions.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
