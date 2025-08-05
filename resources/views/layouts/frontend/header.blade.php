<!-- Mini Header (Fixed on Desktop, Hidden on Mobile) -->
<div class="bg-gray-600 py-2 shadow-sm hidden md:block fixed top-0 left-0 w-full z-[60]">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center">
            <div class="text-sm text-white">Serving Since 1995</div>
            <nav class="flex items-center space-x-6">
                <a href="/" class="text-sm text-white hover:text-[#FF6F00]">Home</a>
                <a href="{{ route('frontend.blogs') }}" class="text-sm text-white hover:text-[#FF6F00]">Blog</a>
                <a href="{{ route('frontend.travel.guide') }}" class="text-sm text-white hover:text-[#FF6F00]">Travel Guide</a>
                <a href="{{ route('frontend.contact.us') }}" class="text-sm text-white hover:text-[#FF6F00]">Contact Us</a>
                <a href="javascript:void(0)" class="text-sm text-white hover:text-[#FF6F00]">
                    <i class="fa fa-search"></i>
                </a>
            </nav>
        </div>
    </div>
</div>

<header class="fixed top-0 md:top-8 left-0 w-full shadow-md z-50 bg-blue-200">
    <div class="max-w-6xl mx-auto flex items-center justify-between h-[93px] px-4">
        <a href="/">
            <img class="w-[110px] md:w-[80px] lg:w-[80px] h-[80px] mt-[3px] ml-[-5px] cursor-pointer rounded-full object-contain mix-blend-multiply " id="logo"
                src="{{asset('images/logo.png')}}" alt=" Logo" />
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
                        <span class="mr-2 opacity-0 group-hover:opacity-100 text-orange-400 transition-opacity">→</span>
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
