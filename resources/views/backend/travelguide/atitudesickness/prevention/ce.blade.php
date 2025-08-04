@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <h1>{{ isset($note) ? 'Edit Prevention' : 'Create Prevention' }}</h1>

        <form method="POST"
            action="{{ isset($note) ? route('admin.preventions.update', $note) : route('admin.preventions.store') }}">
            @csrf
            @if (isset($note))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input class="form-control" type="text" name="title" value="{{ old('title', $note->title ?? '') }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Text</label>
                <textarea class="form-control" name="text" rows="5" required>{{ old('text', $note->text ?? '') }}</textarea>
            </div>

            <button class="btn btn-primary" type="submit">{{ isset($note) ? 'Update' : 'Save' }}</button>
            <a class="btn btn-secondary" href="{{ route('admin.preventions.index') }}">Cancel</a>
        </form>
    </div>
    <style>
        textarea,
        input {
            color: black;
        }
    </style>
@endsection
