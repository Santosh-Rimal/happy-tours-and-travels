@extends('layouts.backend.master')
@section('content')
<div class="container mt-4">
    <h2>{{ $blog->title }}</h2>
    @if($blog->image)
        <div class="mb-3"><img src="{{ asset('storage/'.$blog->image) }}" width="300" /></div>
    @endif
    <div class="mb-3">{!! nl2br(e($blog->content)) !!}</div>
    <div class="mb-3 text-muted">Created at: {{ $blog->created_at->format('Y-m-d H:i') }}</div>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
