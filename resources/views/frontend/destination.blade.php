@extends('layouts.frontend.master')

@section('content')
<div class="bg-white">
    <!-- Hero Section -->
    <div class="relative bg-gray-900 mt-[123px]">
        <div class="absolute inset-0 overflow-hidden">
            <img class="w-full h-full object-cover opacity-40" src="https://images.unsplash.com/photo-1526397751294-331021109fbd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Mountain landscape">
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Explore Our Destinations
            </h1>
            <p class="mt-6 text-xl text-gray-300 max-w-3xl mx-auto">
                Discover breathtaking treks and cultural experiences across the Himalayas
            </p>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
            <div class="w-full sm:w-auto">
                <label for="region" class="sr-only">Filter by Region</label>
                <select id="region" name="region" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm rounded-md">
                    <option>All Regions</option>
                    <option>Everest Region</option>
                    <option>Annapurna Region</option>
                    <option>Langtang Region</option>
                    <option>Manaslu Region</option>
                    <option>Western Nepal</option>
                </select>
            </div>
            <div class="w-full sm:w-auto">
                <label for="activity" class="sr-only">Filter by Activity</label>
                <select id="activity" name="activity" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm rounded-md">
                    <option>All Activities</option>
                    <option>Trekking</option>
                    <option>Peak Climbing</option>
                    <option>Cultural Tours</option>
                    <option>Wildlife Safari</option>
                    <option>Adventure Sports</option>
                </select>
            </div>
            <div class="w-full sm:w-auto">
                <label for="difficulty" class="sr-only">Filter by Difficulty</label>
                <select id="difficulty" name="difficulty" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm rounded-md">
                    <option>All Difficulty Levels</option>
                    <option>Easy</option>
                    <option>Moderate</option>
                    <option>Challenging</option>
                    <option>Strenuous</option>
                </select>
            </div>
            <div class="w-full sm:w-auto">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                    Filter Destinations
                </button>
            </div>
        </div>
    </div>

    <!-- Destinations Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            <!-- Destination Card 1 -->
            <div class="group relative">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1580655653888-2a6e5a0d2a1e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Everest Base Camp" class="w-full h-full object-center object-cover group-hover:opacity-75 transition duration-300">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            <a href="/destinations/everest-base-camp">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Everest Base Camp Trek
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">14-16 Days | 5,364m</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-medium text-emerald-600">$1,250</p>
                        <p class="text-sm text-gray-500">per person</p>
                    </div>
                </div>
                <div class="mt-2 flex items-center">
                    <svg class="h-4 w-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-sm text-gray-500">4.8 (256 reviews)</span>
                </div>
            </div>

            <!-- Destination Card 2 -->
            <div class="group relative">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Annapurna Circuit" class="w-full h-full object-center object-cover group-hover:opacity-75 transition duration-300">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            <a href="/destinations/annapurna-circuit">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Annapurna Circuit Trek
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">18-21 Days | 5,416m</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-medium text-emerald-600">$1,450</p>
                        <p class="text-sm text-gray-500">per person</p>
                    </div>
                </div>
                <div class="mt-2 flex items-center">
                    <svg class="h-4 w-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-sm text-gray-500">4.9 (198 reviews)</span>
                </div>
            </div>

            <!-- Destination Card 3 -->
            <div class="group relative">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1564501049557-79a53b6a5e3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Langtang Valley" class="w-full h-full object-center object-cover group-hover:opacity-75 transition duration-300">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            <a href="/destinations/langtang-valley">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Langtang Valley Trek
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">10-12 Days | 3,870m</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-medium text-emerald-600">$950</p>
                        <p class="text-sm text-gray-500">per person</p>
                    </div>
                </div>
                <div class="mt-2 flex items-center">
                    <svg class="h-4 w-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-sm text-gray-500">4.7 (142 reviews)</span>
                </div>
            </div>

            <!-- Destination Card 4 -->
            <div class="group relative">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1564501049557-79a53b6a5e3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Manaslu Circuit" class="w-full h-full object-center object-cover group-hover:opacity-75 transition duration-300">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            <a href="/destinations/manaslu-circuit">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Manaslu Circuit Trek
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">14-16 Days | 5,106m</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-medium text-emerald-600">$1,350</p>
                        <p class="text-sm text-gray-500">per person</p>
                    </div>
                </div>
                <div class="mt-2 flex items-center">
                    <svg class="h-4 w-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-sm text-gray-500">4.8 (112 reviews)</span>
                </div>
            </div>

            <!-- Destination Card 5 -->
            <div class="group relative">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1564501049557-79a53b6a5e3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Upper Mustang" class="w-full h-full object-center object-cover group-hover:opacity-75 transition duration-300">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            <a href="/destinations/upper-mustang">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Upper Mustang Trek
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">12-14 Days | 3,840m</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-medium text-emerald-600">$1,650</p>
                        <p class="text-sm text-gray-500">per person</p>
                    </div>
                </div>
                <div class="mt-2 flex items-center">
                    <svg class="h-4 w-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-sm text-gray-500">4.9 (87 reviews)</span>
                </div>
            </div>

            <!-- Destination Card 6 -->
            <div class="group relative">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1564501049557-79a53b6a5e3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Ghorepani Poon Hill" class="w-full h-full object-center object-cover group-hover:opacity-75 transition duration-300">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            <a href="/destinations/ghorepani-poonhill">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Ghorepani Poon Hill Trek
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">7-9 Days | 3,210m</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-medium text-emerald-600">$650</p>
                        <p class="text-sm text-gray-500">per person</p>
                    </div>
                </div>
                <div class="mt-2 flex items-center">
                    <svg class="h-4 w-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-sm text-gray-500">4.6 (203 reviews)</span>
                </div>
            </div>

            <!-- Destination Card 7 -->
            <div class="group relative">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1564501049557-79a53b6a5e3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Mardi Himal" class="w-full h-full object-center object-cover group-hover:opacity-75 transition duration-300">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            <a href="/destinations/mardi-himal">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Mardi Himal Trek
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">8-10 Days | 4,500m</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-medium text-emerald-600">$850</p>
                        <p class="text-sm text-gray-500">per person</p>
                    </div>
                </div>
                <div class="mt-2 flex items-center">
                    <svg class="h-4 w-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-sm text-gray-500">4.7 (156 reviews)</span>
                </div>
            </div>

            <!-- Destination Card 8 -->
            <div class="group relative">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1564501049557-79a53b6a5e3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Kanchenjunga" class="w-full h-full object-center object-cover group-hover:opacity-75 transition duration-300">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            <a href="/destinations/kanchenjunga">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Kanchenjunga Trek
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">22-25 Days | 5,143m</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-medium text-emerald-600">$2,150</p>
                        <p class="text-sm text-gray-500">per person</p>
                    </div>
                </div>
                <div class="mt-2 flex items-center">
                    <svg class="h-4 w-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-sm text-gray-500">4.9 (64 reviews)</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <nav class="flex justify-between items-center" aria-label="Pagination">
            <div class="flex-1 flex justify-between sm:justify-start">
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Previous
                </a>
                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Next
                </a>
            </div>
            <div class="hidden sm:block">
                <p class="text-sm text-gray-700">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">8</span> of <span class="font-medium">24</span> results
                </p>
            </div>
        </nav>
    </div>

    <!-- Call to Action -->
    <div class="bg-emerald-700">
        <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                <span class="block">Can't find what you're looking for?</span>
                <span class="block">We can create a custom trip just for you.</span>
            </h2>
            <p class="mt-4 text-lg leading-6 text-emerald-200">
                Our travel experts will design an itinerary based on your specific interests and requirements.
            </p>
            <a href="/customize-trip" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-emerald-600 bg-white hover:bg-emerald-50 sm:w-auto">
                Customize Your Trip
            </a>
        </div>
    </div>
</div>
@endsection