@extends('layouts.backend.master')

@section('title', 'Trip Not Includes')

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
    <div class="bg-gray-800 rounded-lg shadow p-6 max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white mb-6">Trip Not Includes List</h2>
            <a class="bg-blue-600 hover:bg-blue-700 text-white px-2 text-[10px]  sm:text-base sm:px-4 py-2 rounded"
                href="{{ route('admin.notincludes.create') }}">
                Create Trip Not Inclusion
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-gray-600 text-white">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left border-b border-gray-600">#</th>
                        <th class="px-4 py-3 text-left border-b border-gray-600">Trip Title</th>
                        <th class="px-4 py-3 text-left border-b border-gray-600">Not Includes</th>
                        <th class="px-4 py-3 text-left border-b border-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($notincludes as $index => $notinclude)
                        <tr class="bg-gray-700/30 hover:bg-gray-700/50 transition-colors">
                            <td class="px-4 py-3 border-b border-gray-600">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border-b border-gray-600">{{ $notinclude->tripDetail->trip_name ?? 'N/A' }}
                            </td>
                            <td class="px-4 py-3 border-b border-gray-600">
                                @if (is_array($notinclude->notincludes))
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach ($notinclude->notincludes as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span>{{ $notinclude->notincludes }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 border-b border-gray-600">
                                <div class="flex space-x-2">
                                    <a class="text-blue-400 hover:text-blue-300"
                                        href="{{ route('admin.notincludes.edit', $notinclude->id) }}">Edit</a>

                                    <a class="text-green-400 hover:text-green-300"
                                        href="{{ route('admin.notincludes.show', $notinclude->id) }}">Show</a>

                                    <form class="inline" action="{{ route('admin.notincludes.destroy', $notinclude->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-400 hover:text-red-300 mr-3" type="submit"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center py-4 text-gray-400" colspan="6"> Not Inclusion on Trip not available.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
