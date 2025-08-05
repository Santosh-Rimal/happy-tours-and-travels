@extends('layouts.backend.master')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">Recent CSR Activities</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Manage your corporate social responsibility initiatives</p>
            </div>
            <a class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg transition duration-300 flex items-center gap-2 shadow-md"
                href="{{ route('admin.csrs.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add New CSR
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg dark:bg-green-900 dark:border-green-600 dark:text-green-200">
                <div class="flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="text-green-700 dark:text-green-200" onclick="this.parentElement.parentElement.style.display='none'">
                        &times;
                    </button>
                </div>
            </div>
        @endif

        @if($csrs->isEmpty())
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-800 dark:text-gray-200">No CSR Activities Found</h3>
                <p class="mt-1 text-gray-600 dark:text-gray-400">Get started by creating your first CSR activity</p>
                <div class="mt-6">
                    <a href="{{ route('admin.csrs.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300">
                        Create CSR Activity
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($csrs as $csr)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 border border-gray-200 dark:border-gray-700">
                        @if ($csr->image)
                            <img class="w-full h-48 object-cover" src="{{ $csr->image }}" alt="{{ $csr->title }}" loading="lazy">
                        @else
                            <div class="w-full h-48 bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">{{ $csr->title }}</h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">{{ $csr->description }}</p>
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $csr->created_at->format('M d, Y') }}
                                </span>
                                <div class="flex space-x-3">
                                    <a class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200"
                                        href="{{ route('admin.csrs.show', $csr->id) }}" title="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a class="text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300 transition duration-200"
                                        href="{{ route('admin.csrs.edit', $csr->id) }}" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.csrs.destroy', $csr->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition duration-200" 
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
                        </div>
                    </div>
                @endforeach
            </div>

           

            @if(method_exists($csrs, 'links'))
            <div class="mt-16 flex justify-center">
                {{ $csrs->links('vendor.pagination.tailwind') }}
            </div>
            @endif
        @endif
    </div>
@endsection