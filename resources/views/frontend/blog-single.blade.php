@extends('layouts.frontend.master')

@section('content')
<div class="container py-12 max-w-4xl mx-auto px-4 mt-[123px]">
    <!-- Back button -->
    <div class="mb-8">
        <a href="{{ route('frontend.blogs') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Back to Blog
        </a>
    </div>

    <!-- Article Header -->
    <article class="max-w-3xl mx-auto">
        <header class="mb-10">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-4">{{ $blog->title }}</h1>
            <div class="flex items-center text-gray-600 space-x-4">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $blog->created_at->format('F j, Y') }}
                </span>
               
            </div>
        </header>

        <!-- Featured Image -->
        @if($blog->image)
        <div class="mb-12 rounded-xl overflow-hidden shadow-lg">
            <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}" 
                 class="w-full h-auto max-h-[500px] object-cover transition-transform duration-500 hover:scale-105">
        </div>
        @endif

        <!-- Article Content -->
        <div class="prose prose-lg max-w-none text-gray-700">
            {!! nl2br(e($blog->content)) !!}
        </div>

        <!-- Tags/Categories -->
        @if($blog->tags)
        <div class="mt-12 pt-6 border-t border-gray-200">
            <div class="flex flex-wrap gap-2">
                @foreach(explode(',', $blog->tags) as $tag)
                <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">{{ trim($tag) }}</span>
                @endforeach
            </div>
        </div>
        @endif

       
    </article>
</div>

<style>
    /* Custom prose styles */
    .prose {
        line-height: 1.75;
    }
    .prose h2 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-top: 2rem;
        margin-bottom: 1rem;
        color: #111827;
    }
    .prose h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
        color: #111827;
    }
    .prose p {
        margin-bottom: 1.25rem;
    }
    .prose a {
        color: #3b82f6;
        text-decoration: underline;
    }
    .prose ul, .prose ol {
        margin-bottom: 1.25rem;
        padding-left: 1.5rem;
    }
    .prose img {
        border-radius: 0.5rem;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    .prose blockquote {
        border-left: 4px solid #e5e7eb;
        padding-left: 1rem;
        font-style: italic;
        color: #6b7280;
        margin: 1.5rem 0;
    }
    .prose pre {
        background-color: #f3f4f6;
        padding: 1rem;
        border-radius: 0.5rem;
        overflow-x: auto;
        margin: 1.5rem 0;
    }
    .prose code {
        background-color: #f3f4f6;
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
        font-family: monospace;
    }
</style>
@endsection