<!-- Mobile Sidebar -->
<aside
    class="fixed top-16 inset-x-0 bg-gray-800 transform -translate-y-full transition-transform duration-300 z-40 md:hidden shadow-lg"
    id="mobileSidebar">
    <div class="p-4 h-[calc(100vh-4rem)] overflow-y-auto">
        <nav class="space-y-1">
            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('dashboard') }}">
                <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Dashboard
            </a>

            <div class="px-4 pt-4 pb-2">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">About Trip</span>
            </div>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.categories.index') }}">
                <svg class="w-5 h-5 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                    </path>
                </svg>
                Trip Categories
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.tripdetails.index') }}">
                <svg class="w-5 h-5 mr-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                    </path>
                </svg>
                Trip Details
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.herosections.index') }}">
                <svg class="w-5 h-5 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                Slider Images
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.highlights.index') }}">
                <svg class="w-5 h-5 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                    </path>
                </svg>
                Trip Highlights
            </a>

            <div class="px-4 pt-4 pb-2">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Trip Details</span>
            </div>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.abouttrips.index') }}">
                <svg class="w-5 h-5 mr-3 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                About Trip
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.itineraries.index') }}">
                <svg class="w-5 h-5 mr-3 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
                Itinerary
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.includes.index') }}">
                <svg class="w-5 h-5 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Includes
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.notincludes.index') }}">
                <svg class="w-5 h-5 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                Not Includes
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.usefulinformations.index') }}">
                <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                Useful Info
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.affiliatedpartners.index') }}">
                <svg class="w-5 h-5 mr-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
                Partners
            </a>
            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.blogs.index') }}">
                <svg class="w-5 h-5 mr-3 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
                Blogs
            </a>
            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.galleries.index') }}">
                <svg class="w-5 h-5 mr-3 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M3 7l9 6 9-6"></path>
                </svg>
                Gallery
            </a>
            <div class="px-4 pt-4 pb-2">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">About Us</span>
            </div>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.abouts.index') }}">
                <svg class="w-5 h-5 mr-3 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                About US
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.teams.index') }}">
                <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Team Members
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.features.index') }}">
                <svg class="w-5 h-5 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Features
            </a>
            <div class="px-4 pt-4 pb-2">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Youtube Video</span>
            </div>
            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.Videos.index') }}">
                <svg class="w-5 h-5 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 10l4.553-2.276A1 1 0 01221 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                    </path>
                </svg>
                Youtube Video
            </a>
            <div class="px-4 pt-4 pb-2">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider"> Corporate
                    Responsibility</span>
            </div>
            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.corporateresponsibilites.index') }}">
                <svg class="w-5 h-5 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
                Corporate Responsibility
            </a>
            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.csrs.index') }}">
                <svg class="w-5 h-5 mr-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                    </path>
                </svg>
                Recent CSR
            </a>
            <div class="px-4 pt-4 pb-2">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Travel Guide</span>
            </div>
            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.seasons.index') }}">
                <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Season
            </a>


            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.trekkings.index') }}">
                <svg class="w-5 h-5 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                    </path>
                </svg>
                Trekking Package
            </a>
            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.visas.index') }}">
                <svg class="w-5 h-5 mr-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                    </path>
                </svg>
                About Visas
            </a>
            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.altitudesickness.index') }}">
                <svg class="w-5 h-5 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
                Altitude Sickness
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.preventions.index') }}">
                <svg class="w-5 h-5 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Preventions
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.safetymeasures.index') }}">
                <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                    </path>
                </svg>
                Safety Measures
            </a>

            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.culturaldoes.index') }}">
                <svg class="w-5 h-5 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Our culture does
            </a>
            <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors"
                href="{{ route('admin.culturaldoesnots.index') }}">
                <svg class="w-5 h-5 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                    </path>
                </svg>
                Our culture doesn't
            </a>
        </nav>
    </div>
</aside>

<!-- Desktop Sidebar -->
<aside class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 h-screen bg-gray-800 border-r border-gray-700">
        <div class="flex items-center justify-center h-[85px] px-4 border-b border-gray-700">
            {{-- <img class="h-12 w-auto max-w-[120px]  object-contain" src="{{ asset('images/Hero1.jpeg') }}" alt="logo"> --}}
            <h2 class="text-base font-bold text-blue-400">Happy Tours & Travels</h2>
        </div>
        <div class="flex flex-col flex-grow overflow-y-auto">
            <nav class="flex-1 px-2 py-4 space-y-1">
                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('dashboard') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    Dashboard
                </a>

                <div class="px-4 pt-6 pb-2">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">About Trip</span>
                </div>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.categories.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-green-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                        </path>
                    </svg>
                    Trip Categories
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.tripdetails.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-yellow-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                        </path>
                    </svg>
                    Trip Details
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.herosections.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-purple-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    Slider Images
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.highlights.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-red-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                        </path>
                    </svg>
                    Trip Highlights
                </a>

                <div class="px-4 pt-6 pb-2">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Trip Details</span>
                </div>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.abouttrips.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-indigo-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    About Trip
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.itineraries.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-teal-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    Itinerary
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.includes.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-green-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    Includes
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.notincludes.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-red-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Not Includes
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.usefulinformations.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Useful Info
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.affiliatedpartners.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-yellow-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                    Partners
                </a>
                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.blogs.index') }}">
                    <svg class="w-5 h-5 mr-3 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                    Blogs
                </a>
                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.galleries.index') }}">
                    <svg class="w-5 h-5 mr-3 text-indigo-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M3 7l9 6 9-6"></path>
                    </svg>
                    Gallery
                </a>

                <div class="px-4 pt-4 pb-2">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">About Us</span>
                </div>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.abouts.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                    About US
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.teams.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-indigo-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    Team Members
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.features.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-teal-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Features
                </a>

                <div class="px-4 pt-4 pb-2">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Youtube Video</span>
                </div>
                <a class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 text-gray-200 hover:text-white transition-colors group"
                    href="{{ route('admin.Videos.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-red-400 transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 10l4.553-2.276A1 1 0 01221 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                        </path>
                    </svg>
                    Youtube Video
                </a>

                <div class="px-4 pt-4 pb-2">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider"> Corporate
                        Responsibility</span>
                </div>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.corporateresponsibilites.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-green-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                        </path>
                    </svg>
                    Corporate Responsibility
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.csrs.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-yellow-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Recent CSR
                </a>
                <!-- Travel Guide section -->
                <div class="px-4 pt-4 pb-2">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider"> Travel Guide</span>
                </div>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.seasons.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-purple-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Seasons
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.visas.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                        </path>
                    </svg>
                    About Visas
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.trekkings.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Trekking Package
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.altitudesickness.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-red-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    Altitude Sickness
                </a>


                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.preventions.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-green-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                        </path>
                    </svg>
                    Preventions
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.safetymeasures.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-yellow-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01">
                        </path>
                    </svg>
                    Safety Measures
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.culturaldoes.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-teal-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Our culture does
                </a>

                <a class="flex items-center px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                    href="{{ route('admin.culturaldoesnots.index') }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-red-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    Our culture doesn't
                </a>
            </nav>

            <div class="px-4 py-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="flex items-center w-full px-4 py-3 text-sm font-medium text-gray-200 hover:text-white hover:bg-gray-700 rounded-lg group"
                        type="submit" onclick="return confirm('Are you sure you want to logout?')">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-red-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>
