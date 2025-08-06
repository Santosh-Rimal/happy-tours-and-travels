@extends('layouts.backend.master')

@section('content')
    <div class="max-w-3xl mx-auto bg-gray-900 p-8 rounded-lg shadow-lg mt-10 border border-gray-700">
        <h1 class="text-3xl font-bold mb-6 text-gray-100 border-b border-gray-700 pb-4">
            {{ isset($cultural) ? 'Edit Cultural Do' : 'Add Cultural Do' }}
        </h1>

        <form action="{{ isset($cultural) ? route('admin.culturaldoes.update', $cultural->id) : route('admin.culturaldoes.store') }}" 
              method="POST"
              class="space-y-6">
            @csrf
            @if(isset($cultural))
                @method('PUT')
            @endif

            <div>
                <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Title *</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $cultural->title ?? '') }}"
                       required
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-gray-100 placeholder-gray-500 transition duration-200">
                @error('title')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="what_do" class="block text-sm font-medium text-gray-300 mb-2">What to Do</label>
                <textarea id="what_do" 
                          name="what_do" 
                          rows="6"
                          class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-gray-100 placeholder-gray-500 transition duration-200">{{ old('what_do', $cultural->what_do ?? '') }}</textarea>
                @error('what_do')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end pt-4">
                <button type="submit" 
                        class="px-6 py-3 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-200 shadow-lg hover:shadow-purple-500/20">
                    {{ isset($cultural) ? 'Update Post' : 'Publish' }}
                </button>
            </div>
        </form>
    </div>
@endsection