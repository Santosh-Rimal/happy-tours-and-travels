@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <h1>{{ isset($culturalDoNot) ? 'Edit Cultural Don\'t' : 'Create Cultural Don\'t' }}</h1>

        <form method="POST"
            action="{{ isset($culturalDoNot) ? route('admin.culturaldoesnots.update', $culturalDoNot) : route('admin.culturaldoesnots.store') }}">
            @csrf
            @if (isset($culturalDoNot))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input class="form-control" type="text" name="title"
                    value="{{ old('title', $culturalDoNot->title ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">What Don’t</label>
                <textarea class="form-control" name="what_donot" rows="4" required>{{ old('what_donot', $culturalDoNot->what_donot ?? '') }}</textarea>
            </div>

            <button class="btn btn-primary" type="submit">{{ isset($culturalDoNot) ? 'Update' : 'Create' }}</button>
            <a class="btn btn-secondary" href="{{ route('admin.culturaldoesnots.index') }}">Cancel</a>
        </form>
    </div>
@endsection
