
@extends('layouts.frontend.master')
@section('content')
<div class="container mt-[120px] max-w-7xl mx-auto px-4 mb-20">
    <div class="text-center mb-16">
        <h1 class="text-5xl font-bold text-gray-900 mb-4 relative inline-block">
            Our Blog
           
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover insightful articles and latest updates</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($blogs as $blog)
            <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 flex flex-col h-full overflow-hidden border border-gray-100 hover:border-indigo-100">
                @if($blog->image)
                    <div class="overflow-hidden h-80 relative">
                        <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}" 
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                @endif
                
                <div class="p-7 flex flex-col flex-grow">
                    <div class="flex items-center text-sm font-medium mb-3">
                        <span class="text-indigo-600">{{ $blog->created_at->format('M d, Y') }}</span>
                        
                       
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 leading-tight hover:text-indigo-600 transition-colors">
                        {{ $blog->title }}
                    </h2>
                    <p class="text-gray-600 mb-6 flex-grow text-lg">
                        {{ Str::limit(strip_tags($blog->content), 180, '...') }}
                    </p>
                   
                    <div class="mt-auto">
                        <a href="{{ route('frontend.blogs.show', $blog->slug) }}" 
                           class="group inline-flex items-center text-indigo-600 hover:text-indigo-800 font-semibold text-lg transition-colors">
                            Read More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    {{-- Pagination --}}
    @if(method_exists($blogs, 'links'))
    <div class="mt-16 flex justify-center">
        {{ $blogs->links('vendor.pagination.tailwind') }}
    </div>
    @endif
</div>
@endsection
