@extends('layouts.backend.master')

@section('title', 'Trip Details')

@section('content')
    {{-- Include Alpine.js for auto-hide --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- Create Success --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-600 text-white rounded shadow" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
            x-show="show">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Update Success --}}
    @if (session('edit_update'))
        <div class="mb-4 p-4 bg-blue-600 text-white rounded shadow" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
            x-show="show">
            ✏️ {{ session('edit_update') }}
        </div>
    @endif

    {{-- Delete Success --}}
    @if (session('delete'))
        <div class="mb-4 p-4 bg-red-600 text-white rounded shadow" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
            x-show="show">
            🗑️ {{ session('delete') }}
        </div>
    @endif

    <div class="bg-gray-800 rounded-lg shadow p-6 mt-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl sm:text-2xl font-bold">About Trip Details</h2>
            <a class="bg-blue-600 hover:bg-blue-700 text-white px-2 text-[10px] sm:text-base sm:px-4 py-2 rounded"
                href="{{ route('admin.abouttrips.create') }}">
                Create New About Trip
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">About
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Short
                            Description
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @forelse($abouttrips as $abouttrip)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $abouttrip->title }}</td>
                            <td class="px-6 py-4 whitespace-normal w-1/4">
                                {!! $abouttrip->trip_description !!}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap w-28 h-24 object-cover"><img width="200px"
                                    src="{{ asset('storage/' . $abouttrip->image) }}" alt=""></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a class="text-blue-400 hover:text-blue-300 mr-3"
                                    href="{{ route('admin.abouttrips.edit', $abouttrip->id) }}">Edit</a>
                                <form class="inline" action="{{ route('admin.abouttrips.destroy', $abouttrip->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-400 hover:text-red-300 mr-3" type="submit"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                <a class="text-green-400 hover:text-green-300"
                                    href="{{ route('admin.abouttrips.show', $abouttrip->id) }}">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center py-4 text-gray-400" colspan="6"> About trips not available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
