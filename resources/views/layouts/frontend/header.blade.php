<!-- Mini Header (Fixed on Desktop, Hidden on Mobile) -->
<div class="bg-gray-600 py-2 shadow-sm hidden md:block fixed top-0 left-0 w-full z-[60]">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center">
            <div class="text-sm text-white">Serving Since 1995</div>
            <nav class="flex items-center space-x-6">
                <a class="text-sm text-white hover:text-[#FF6F00]" href="/">Home</a>
                <a class="text-sm text-white hover:text-[#FF6F00]" href="{{ route('frontend.blogs') }}">Blog</a>
                <a class="text-sm text-white hover:text-[#FF6F00]" href="{{ route('frontend.travel.guide') }}">Travel Guide</a>
                <a class="text-sm text-white hover:text-[#FF6F00]" href="{{ route('frontend.contact.us') }}">Contact Us</a>
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
            <img class="w-[110px] md:w-[80px] lg:w-[80px] h-[80px] mt-[3px] ml-[-5px] cursor-pointer rounded-full object-contain mix-blend-multiply"
                id="logo" src="{{ asset('images/logo.png') }}" alt="Logo" />
        </a>
        
        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center justify-center gap-4">
            @foreach ($limitednavtripdetails as $limitednavtripdetail)
                <div class="group relative px-2 py-4 rounded-lg transition-all duration-200">
                    <a href="{{ route('frontend.trip.show', $limitednavtripdetail->trip_slug) }}"
                        class="flex items-center text-gray-700 hover:text-orange-600 transition-colors text-sm">
                        <span class="relative after:absolute  after:left-0 after:w-0 after:h-0.5  after:transition-all group-hover:after:w-full">
                            {{ $limitednavtripdetail->trip_name }}
                        </span>
                        <svg class="ml-1 w-4 h-4 text-gray-400 group-hover:text-orange-500 transition-transform group-hover:rotate-180"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
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
            
            <!-- Separator -->
            <div class="w-px h-6 bg-gray-200 mx-2"></div>
            
            <!-- All Treks Dropdown (Desktop) -->
           <div class="group relative px-2 py-4 rounded-lg transition-all duration-200 cursor-pointer">
    <button class="flex items-center text-gray-700 hover:text-orange-600 transition-colors text-sm cursor-pointer">
        <span class="relative after:absolute after:left-0 after:w-0 after:h-0.5 after:transition-all group-hover:after:w-full">
            All Treks
        </span>
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
                           class="flex items-center text-sm text-gray-700 hover:text-orange-600 transition-colors py-1.5 cursor-pointer">
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
        </div>

        <div class="hidden md:flex items-center space-x-10">
            <div class="flex flex-col">
                <p class="text-red-500 font-bold text-[20px]">987654324</p>
                <p class="text-base font-normal">Call us on Whatsapp and Viber</p>
            </div>
        </div>

        <!-- Mobile Menu Toggle -->
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
        <div class="max-h-[70vh] overflow-y-auto">
            <ul class="flex flex-col py-2 text-[15px] font-[500]">
                <!-- Limited Trip Links (Mobile) -->
                @foreach ($limitednavtripdetails as $limitednavtripdetail)
                    <li class="border-b border-gray-300">
                        <a class="flex items-center px-4 py-3 hover:text-[#FF6F00] transition-colors"
                           href="{{ route('frontend.trip.show', $limitednavtripdetail->trip_slug) }}">
                            <span class="mr-2 text-orange-400">→</span>
                            {{ $limitednavtripdetail->trip_name }}
                        </a>
                    </li>
                @endforeach
                
                <!-- All Treks Dropdown (Mobile) -->
                <li class="border-b border-gray-300">
                    <button class="w-full text-left px-4 py-3 flex justify-between items-center hover:text-[#FF6F00] all-treks-toggle">
                        All Treks
                        <svg class="w-4 h-4 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <!-- Submenu -->
                    <div class="hidden bg-blue-100 px-4 py-2 space-y-2 all-treks-submenu">
                        @forelse ($navtripdetails as $navtripdetail)
                            <div class="flex justify-between items-center">
                                <h4 class="font-bold text-[#FF6F00]">{{ $navtripdetail->category->name }}</h4>
                                <button class="toggle-trek-list text-[#FF6F00] text-xl font-bold focus:outline-none">
                                    +
                                </button>
                            </div>
                            <ul class="max-h-0 overflow-hidden transition-all duration-300 inner-trek-list pl-2">
                                <li>
                                    <a class="block py-1 hover:text-[#FF6F00]"
                                        href="{{ route('frontend.trip.show', $navtripdetail->trip_slug) }}">
                                        {{ $navtripdetail->trip_name }}
                                    </a>
                                </li>
                            </ul>
                        @empty
                            <p class="text-red-500">No treks available</p>
                        @endforelse
                    </div>
                </li>
                
                <!-- Contact -->
                <li class="border-b border-gray-300">
                    <div class="px-4 py-3">
                        <p class="text-red-500 font-bold">987654324</p>
                        <p class="text-sm">Call us on Whatsapp and Viber</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- JavaScript for Mobile Menu -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const menuIcon = document.getElementById('menuIcon');
        
        // Toggle mobile menu
        menuToggle.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.toggle('max-h-0');
            mobileMenu.classList.toggle('max-h-[70vh]');
            mobileOverlay.classList.toggle('hidden');
            
            // Change menu icon
            if (!isOpen) {
                menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
            } else {
                menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
            }
        });
        
        // Close menu when clicking overlay
        mobileOverlay.addEventListener('click', function() {
            mobileMenu.classList.add('max-h-0');
            mobileMenu.classList.remove('max-h-[70vh]');
            mobileOverlay.classList.add('hidden');
            menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
        });
        
        // Toggle All Treks submenu on mobile
        const allTreksToggle = document.querySelector('.all-treks-toggle');
        if (allTreksToggle) {
            allTreksToggle.addEventListener('click', function() {
                const submenu = this.nextElementSibling;
                const isHidden = submenu.classList.contains('hidden');
                
                // Close all other open submenus first
                document.querySelectorAll('.all-treks-submenu').forEach(menu => {
                    if (menu !== submenu) menu.classList.add('hidden');
                });
                
                // Toggle current submenu
                submenu.classList.toggle('hidden');
                
                // Rotate arrow icon
                const arrow = this.querySelector('svg');
                arrow.classList.toggle('rotate-180');
            });
        }
        
        // Toggle inner trek lists on mobile
        document.querySelectorAll('.toggle-trek-list').forEach(button => {
            button.addEventListener('click', function() {
                const list = this.parentElement.nextElementSibling;
                const isCollapsed = list.classList.contains('max-h-0');
                
                list.classList.toggle('max-h-0');
                list.classList.toggle('max-h-[500px]'); // Adjust based on content
                
                // Change button text
                this.textContent = isCollapsed ? '−' : '+';
            });
        });
    });
</script>