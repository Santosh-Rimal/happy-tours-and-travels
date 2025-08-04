@extends('layouts.backend.master')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 mt-10 rounded shadow">
        <div class="flex justify-between mb-4">
            <h2 class="text-2xl font-bold text-black">Cultural Dos</h2>
            <a class="bg-green-600 text-white px-4 py-2 rounded" href="{{ route('admin.culturaldoes.create') }}">Add New</a>
        </div>

        @if (session('success'))
            <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border-collapse text-black">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Title</th>
                    <th class="p-2 border">What to Do</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($culturals as $item)
                    <tr>
                        <td class="p-2 border">{{ $loop->iteration }}</td>
                        <td class="p-2 border">{{ $item->title }}</td>
                        <td class="p-2 border">{{ \Illuminate\Support\Str::limit($item->what_do, 80) }}</td>
                        <td class="p-2 border">
                            <a class="text-blue-600 mr-2" href="{{ route('admin.culturaldoes.edit', $item->id) }}">Edit</a>
                            <form class="inline-block" action="{{ route('admin.culturaldoes.destroy', $item->id) }}"
                                method="POST" onsubmit="return confirm('Delete this item?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
