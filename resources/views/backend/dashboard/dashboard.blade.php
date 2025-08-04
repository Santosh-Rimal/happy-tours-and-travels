@extends('layouts.backend.master')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow p-6 mt-8">
        <h2 class="text-2xl font-bold mb-6">Dashboard Overview</h2>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-gray-700 p-4 rounded-lg shadow">
            <h3 class="text-gray-400 text-sm mb-1">Slider Images</h3>
            <p class="text-2xl font-bold text-blue-400">{{$sliderimage ?? "0"}}</p>
        </div>
        <div class="bg-gray-700 p-4 rounded-lg shadow">
            <h3 class="text-gray-400 text-sm mb-1">Trip Category</h3>
            <p class="text-2xl font-bold text-green-400">{{$tripcategory ?? "0"}}</p>
        </div>
        <div class="bg-gray-700 p-4 rounded-lg shadow">
            <h3 class="text-gray-400 text-sm mb-1">Trip Details</h3>
            <p class="text-2xl font-bold text-purple-400">{{$tripdetail ?? "0"}}</p>
        </div>
    </div>

        @php
            $blogCount = \App\Models\Blog::count();
            $galleryCount = \App\Models\Gallery::count();
        @endphp
       <div class="flex flex-wrap gap-6 p-6">
    <!-- Blog Card -->
    <div class="w-full sm:w-[calc(50%-12px)] md:w-[calc(25%-18px)]">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="px-6 py-4 bg-blue-700/20 border-b border-blue-400/30">
                <h3 class="text-lg font-semibold text-white">Blogs</h3>
            </div>
            <div class="p-6">
                <h4 class="text-3xl font-bold text-white mb-2">{{ $blogCount }}</h4>
                <p class="text-blue-100 font-medium">Total Blogs</p>
                <div class="mt-4 flex justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Card -->
    <div class="w-full sm:w-[calc(50%-12px)] md:w-[calc(25%-18px)]">
        <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="px-6 py-4 bg-emerald-700/20 border-b border-emerald-400/30">
                <h3 class="text-lg font-semibold text-white">Gallery Images</h3>
            </div>
            <div class="p-6">
                <h4 class="text-3xl font-bold text-white mb-2">{{ $galleryCount }}</h4>
                <p class="text-emerald-100 font-medium">Total Gallery Images</p>
                <div class="mt-4 flex justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Recent Bookings Table -->
    {{-- <div class="bg-gray-700 rounded-lg shadow overflow-x-auto">
        <h3 class="text-lg font-semibold p-4 border-b border-gray-600">Recent Bookings</h3>
        <table class="min-w-full divide-y divide-gray-600">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Booking ID</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Customer</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Trip</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-gray-700 divide-y divide-gray-600">
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap">#BK-1001</td>
                    <td class="px-4 py-3 whitespace-nowrap">John Doe</td>
                    <td class="px-4 py-3 whitespace-nowrap">Pokhara Tour</td>
                    <td class="px-4 py-3 whitespace-nowrap text-green-400">Confirmed</td>
                </tr>
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap">#BK-1002</td>
                    <td class="px-4 py-3 whitespace-nowrap">Jane Smith</td>
                    <td class="px-4 py-3 whitespace-nowrap">Everest Base Camp</td>
                    <td class="px-4 py-3 whitespace-nowrap text-yellow-400">Pending</td>
                </tr>
            </tbody>
        </table>
    </div> --}}
    </div>
@endsection
