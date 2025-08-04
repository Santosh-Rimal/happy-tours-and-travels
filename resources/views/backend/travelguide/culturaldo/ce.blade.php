@extends('layouts.backend.master')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow mt-10">
        <h2 class="text-2xl font-bold mb-4 text-black">
            {{ isset($cultural) ? 'Edit Cultural Do' : 'Add Cultural Do' }}
        </h2>

        <form
            action="{{ isset($cultural) ? route('admin.culturaldoes.update', $cultural->id) : route('admin.culturaldoes.store') }}"
            method="POST">
            @csrf
            @if (isset($cultural))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block font-medium text-black" for="title">Title</label>
                <input class="w-full border px-3 py-2 rounded" id="title" type="text" name="title"
                    value="{{ old('title', $cultural->title ?? '') }}">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-black" for="what_do">What to Do</label>
                <textarea class="w-full border px-3 py-2 rounded" id="what_do" name="what_do" rows="4">{{ old('what_do', $cultural->what_do ?? '') }}</textarea>
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">
                {{ isset($cultural) ? 'Update' : 'Save' }}
            </button>
        </form>
    </div>
    <style>
        input,
        textarea {
            color: black;
        }
    </style>
@endsection
