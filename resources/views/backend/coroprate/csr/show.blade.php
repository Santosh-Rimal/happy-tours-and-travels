@extends('layouts.backend.master')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
            @if ($csr->image)
                <img class="w-full h-64 md:h-80 object-cover" 
                     src="{{ $csr->image }}" 
                     alt="{{ $csr->title }}"
                     loading="lazy">
            @else
                <div class="w-full h-64 md:h-80 bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            @endif

            <div class="p-6 md:p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200 mb-2">{{ $csr->title }}</h1>
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Created: {{ $csr->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.csrs.edit', $csr->id) }}" 
                           class="p-2 text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200"
                           title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <form action="{{ route('admin.csrs.destroy', $csr->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="p-2 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition duration-200"
                                    type="submit"
                                    title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this CSR activity?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="prose max-w-none text-gray-700 dark:text-gray-300 mb-6">
                    {!! nl2br(e($csr->description)) !!}
                </div>

                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('admin.csrs.index') }}"
                       class="inline-flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to all CSR Activities
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection