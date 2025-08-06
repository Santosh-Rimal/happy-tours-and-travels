<!-- Mini Header (Fixed on Desktop, Hidden on Mobile) -->
<div class="bg-gray-600 py-2 shadow-sm hidden md:block fixed top-0 left-0 w-full z-[60]">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center">
            <div class="text-sm text-white">Serving Since 1995</div>
            <nav class="flex items-center space-x-6">
                <a class="text-sm text-white hover:text-[#FF6F00]" href="/">Home</a>
                <a class="text-sm text-white hover:text-[#FF6F00]" href="{{ route('frontend.blogs') }}">Blog</a>
                <a class="text-sm text-white hover:text-[#FF6F00]" href="{{ route('frontend.travel.guide') }}">Travel
                    Guide</a>
                <a class="text-sm text-white hover:text-[#FF6F00]" href="{{ route('frontend.contact.us') }}">Contact
                    Us</a>
                <a class="text-sm text-white hover:text-[#FF6F00]" href="javascript:void(0)">
                    <i class="fa fa-search"></i>
                </a>
            </nav>
        </div>
    </div>
</div>

<header class="fixed top-0 md:top-8 left-0 w-full shadow-md z-50 bg-blue-200">
    <div class="max-w-6xl mx-auto flex items-center justify-between h-[93px] px-4">
        <a href="/">
            <img class="w-[110px] md:w-[80px] lg:w-[80px] h-[80px] mt-[3px] ml-[-5px] cursor-pointer rounded-full object-contain mix-blend-multiply "
                id="logo" src="{{ asset('images/logo.png') }}" alt=" Logo" />
        </a>
        <div class="hidden md:flex items-center justify-center gap-4   ">
            @foreach ($limitednavtripdetails as $limitednavtripdetail)
                <div class="group flex flex-col px-2 py-4 hover:bg-gray-50 rounded-lg transition-all duration-200">
                    {{-- <h4 class="text-lg font-semibold text-orange-600 mb-2 group-hover:text-orange-700 transition-colors">
                        {{ $limitednavtripdetail->category->name }}
                    </h4> --}}
                    <a class="flex items-center text-gray-700 hover:text-orange-600 transition-colors text-sm
                      hover:underline underline-offset-4 decoration-orange-300"
                        href="{{ route('frontend.trip.show', $limitednavtripdetail->trip_slug) }}">
                        <span class="mr-2 opacity-0 group-hover:opacity-100 text-orange-400 transition-opacity">→</span>
                        {{ $limitednavtripdetail->trip_name }}
                    </a>
                </div>
            @endforeach
        </div>

        <div class="hidden md:flex items-center space-x-10">
            {{-- <ul class="relative group">
                <li class="relative">
                    <a class="hover:text-[#FF6F00] mr-10" href="/">Category Only 4▼</a>

                    <!-- Mega Dropdown -->
                    <div
                        class="absolute left-1/2 transform -translate-x-[60%] mt-6 w-[800px] bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300 z-10 p-4 max-h-[70vh] overflow-y-auto">
                        <div class="grid grid-cols-3 gap-4">

                            @forelse ($navtripdetails as $key=>$navtripdetail)
                                <!-- Column 1 -->
                                <div>
                                    <h4 class="font-bold mb-2 text-[#FF6F00]">
                                        {{ $navtripdetail->category->name }}
                                    </h4>
                                    <ul class="space-y-1">
                                        <li>
                                            <a class="hover:text-[#FF6F00]"
                                                href="{{ route('frontend.trip.show', $navtripdetail->trip_slug) }}">{{ $navtripdetail->trip_name }}</a>
                                        </li>

                                    </ul>
                                </div>
                            @empty
                                <p>No Navlinks are present</p>
                            @endforelse
                        </div>
                    </div>
                </li>
            </ul> --}}

            <div class="flex flex-col">
                <p class="text-red-500 font-bold text-[20px]">987654324</p>
                <p class="text-base font-normal">Call us on Whatsapp and Viber</p>
            </div>
        </div>

        <div class="md:hidden">
            <button class="text-orange-500 focus:outline-none" id="menuToggle" aria-label="Open menu">
                <svg class="h-8 w-8" id="menuIcon" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Overlay -->
    <div class="hidden md:hidden fixed top-[93px] left-0 w-full h-[calc(100vh-93px)] bg-black bg-opacity-80 z-40"
        id="mobileOverlay"></div>

    <!-- Mobile Menu -->
    <div class="max-h-0 overflow-hidden md:hidden w-full bg-blue-200 absolute top-[93px] left-0 shadow-md z-50 transition-all duration-300"
        id="mobileMenu" role="navigation">
        <div class="max-h-[70vh] overflow-y-auto"> <!-- Scrollable container -->
            <ul class="flex flex-col py-2 text-[15px] font-[500]">
                <!-- Nepal Dropdown -->
                {{-- <li class="border-b border-gray-300">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center hover:text-[#FF6F00] nepal-toggle">
                    Nepal
                    <svg class="w-4 h-4 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Submenu -->
                <div class="hidden bg-blue-200 px-4 py-2 space-y-2 nepal-submenu">
                    @forelse ($navtripdetails as $key=>$navtripdetail)
                        <div class="flex justify-between items-center">
                            <h4 class="font-bold text-[#FF6F00]">{{ $navtripdetail->category->name }}</h4>
                            <button class="toggle-inner-list text-[#FF6F00] text-xl font-bold focus:outline-none">
                                +
                            </button>
                        </div>
                        <ul class="max-h-0 overflow-hidden transition-all duration-300 inner-Nepal-list pl-2">
                            <li>
                                <a class="block py-1 hover:text-[#FF6F00]"
                                    href="{{ route('frontend.trip.show', $navtripdetail->trip_slug) }}">
                                    {{ $navtripdetail->trip_name }}
                                </a>
                            </li>
                        </ul>
                    @empty
                        <p class="text-red-500">No Navlinks are present</p>
                    @endforelse
                </div>
            </li>            --}}

                <div class="flex flex-col md:hidden items-start  gap-4   ">
                    @foreach ($limitednavtripdetails as $limitednavtripdetail)
                        <div class="group flex flex-col py-4 hover:bg-gray-50 rounded-lg transition-all duration-200">
                            {{-- <h4 class="text-lg font-semibold text-orange-600 mb-2 group-hover:text-orange-700 transition-colors">
                        {{ $limitednavtripdetail->category->name }}
                    </h4> --}}
                            <a class="flex items-center text-gray-700 hover:text-orange-600 transition-colors text-sm
                      hover:underline underline-offset-4 decoration-orange-300"
                                href="{{ route('frontend.trip.show', $limitednavtripdetail->trip_slug) }}">
                                <span
                                    class="mr-2 opacity-0 group-hover:opacity-100 text-orange-400 transition-opacity">→</span>
                                {{ $limitednavtripdetail->trip_name }}
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Contact -->
                <li class="border-b border-gray-300">
                    <div class="px-4 py-3">
                        <p class="text-red-500 font-bold">987654324</p>
                        <p class="text-sm">Call us on Whatsapp and Viber</p>
                    </div>
                </li>
            </ul>
        </div>
</header>

{{-- 
<header class="fixed top-0 left-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto flex items-center justify-between h-16 px-4 sm:px-6">
        <!-- Logo - Simplified -->
        <a href="/" class="flex items-center group transition-transform hover:scale-[1.02] active:scale-95">
            <img class="w-10 h-10 object-contain" 
                 src="{{ asset('images/logo.jpg') }}" 
                 alt="Logo"
                 style="filter: hue-rotate(15deg) contrast(1.1) saturate(1.2)">
        </a>

        <!-- Desktop Navigation - More Elegant -->
        <nav class="hidden lg:flex items-center space-x-1">
            <!-- Main Navigation Links -->
            <div class="flex space-x-6 mr-6">
                @foreach ($limitednavtripdetails as $limitednavtripdetail)
                <div class="group relative">
                    <a href="{{ route('frontend.trip.show', $limitednavtripdetail->trip_slug) }}"
                       class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-orange-600 transition-colors">
                        <span class="relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-orange-500 after:transition-all group-hover:after:w-full">
                            {{ $limitednavtripdetail->trip_name }}
                        </span>
                        <svg class="ml-1 w-4 h-4 text-gray-400 group-hover:text-orange-500 transition-transform group-hover:rotate-180" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                    
                    <!-- Mini Dropdown -->
                    <div class="absolute left-0 mt-1 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 origin-top z-10 border border-gray-100">
                        <div class="p-2">
                            <h4 class="px-3 py-1 text-xs font-semibold text-orange-600 uppercase tracking-wider">
                                {{ $limitednavtripdetail->category->name }}
                            </h4>
                            <a href="{{ route('frontend.trip.show', $limitednavtripdetail->trip_slug) }}"
                               class="block px-3 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-md transition-colors">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Separator -->
            <div class="w-px h-6 bg-gray-200 mx-2"></div>
            
            <!-- All Categories Dropdown -->
            <div class="relative group ml-2">
                <button class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-orange-600 transition-colors">
                    <span>All Treks</span>
                    <svg class="ml-1 w-4 h-4 text-gray-400 group-hover:text-orange-500 transition-transform group-hover:rotate-180" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                
                <!-- Mega Dropdown -->
                <div class="absolute right-0 mt-1 w-[800px] bg-white rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 origin-top-right z-10 border border-gray-100 overflow-hidden">
                    <div class="p-6 grid grid-cols-3 gap-6">
                        @forelse ($navtripdetails as $navtripdetail)
                        <div>
                            <h4 class="text-sm font-semibold text-orange-600 pb-2 mb-2 border-b border-orange-100">
                                {{ $navtripdetail->category->name }}
                            </h4>
                            <ul class="space-y-2">
                                <li>
                                    <a href="{{ route('frontend.trip.show', $navtripdetail->trip_slug) }}"
                                       class="flex items-center text-sm text-gray-700 hover:text-orange-600 transition-colors py-1.5">
                                        <span class="w-1.5 h-1.5 bg-orange-300 rounded-full mr-2"></span>
                                        {{ $navtripdetail->trip_name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @empty
                        <div class="col-span-3 text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="mt-2 text-sm text-gray-500">No treks available at the moment</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </nav>

        <!-- Contact & Mobile Toggle -->
        <div class="flex items-center space-x-4">
            <!-- Contact - More Compact -->
            <div class="hidden lg:flex items-center space-x-3">
                <a href="tel:987654324" class="flex items-center group">
                    <div class="p-1.5 bg-orange-100 rounded-lg group-hover:bg-orange-200 transition-colors">
                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div class="ml-1">
                        <p class="text-sm font-semibold text-gray-900">987654324</p>
                        <p class="text-xs text-gray-500">Call/WhatsApp/Viber</p>
                    </div>
                </a>
            </div>
            
            <!-- Mobile Menu Toggle - More Refined -->
            <button class="lg:hidden p-2 rounded-md hover:bg-gray-100 transition-colors focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50"
                    id="menuToggle" aria-label="Open menu">
                <svg class="h-6 w-6 text-gray-700" id="menuIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu - More Elegant -->
    <div class="lg:hidden fixed top-16 left-0 w-full bg-white shadow-lg z-40 transition-all duration-300 transform -translate-y-full opacity-0"
         id="mobileMenu">
        <div class="divide-y divide-gray-100 max-h-[calc(100vh-4rem)] overflow-y-auto">
            <!-- Quick Links -->
            <div class="p-4 space-y-3">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider px-2">Popular Treks</h3>
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($limitednavtripdetails as $limitednavtripdetail)
                    <a href="{{ route('frontend.trip.show', $limitednavtripdetail->trip_slug) }}"
                       class="flex flex-col p-3 rounded-lg hover:bg-orange-50 transition-colors border border-gray-100">
                        <span class="text-sm font-medium text-gray-900">{{ $limitednavtripdetail->trip_name }}</span>
                        <span class="text-xs text-orange-600 mt-0.5">{{ $limitednavtripdetail->category->name }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
            
            <!-- All Categories -->
            <div class="p-4">
                <div class="accordion-group space-y-1">
                    <button class="accordion-toggle flex items-center justify-between w-full py-3 text-left text-sm font-medium text-gray-900 hover:text-orange-600 transition-colors">
                        <span>All Trek Categories</span>
                        <svg class="w-4 h-4 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content hidden pl-2 pt-1 space-y-2">
                        @forelse ($navtripdetails as $navtripdetail)
                        <div class="border-l-2 border-orange-200 pl-3">
                            <h4 class="text-xs font-semibold text-orange-600 uppercase tracking-wider">{{ $navtripdetail->category->name }}</h4>
                            <a href="{{ route('frontend.trip.show', $navtripdetail->trip_slug) }}"
                               class="block py-1.5 text-sm text-gray-700 hover:text-orange-600 transition-colors">
                                {{ $navtripdetail->trip_name }}
                            </a>
                        </div>
                        @empty
                        <p class="text-sm text-gray-500 py-2">No categories available</p>
                        @endforelse
                    </div>
                </div>
            </div>
            
            <!-- Contact - Mobile Version -->
            <div class="p-4 bg-gray-50">
                <a href="tel:987654324" class="flex items-center space-x-3 p-3 rounded-lg bg-white hover:bg-orange-50 transition-colors shadow-sm">
                    <div class="p-1.5 bg-orange-100 rounded-lg">
                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900">987654324</p>
                        <p class="text-xs text-gray-500">Call/WhatsApp/Viber</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div class="lg:hidden fixed inset-0 bg-black/30 z-30 opacity-0 invisible transition-opacity duration-300"
         id="mobileOverlay"></div>
</header> --}}
