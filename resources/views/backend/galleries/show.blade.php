@extends('layouts.backend.master')
@section('content')
<div class="container mt-4">
    <h2>{{ $gallery->title }}</h2>
    <div class="mb-3"><img src="{{ asset('storage/'.$gallery->image) }}" width="300" /></div>
    @if($gallery->caption)
        <div class="mb-3">{{ $gallery->caption }}</div>
    @endif
    <div class="mb-3 text-muted">Created at: {{ $gallery->created_at->format('Y-m-d H:i') }}</div>
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
