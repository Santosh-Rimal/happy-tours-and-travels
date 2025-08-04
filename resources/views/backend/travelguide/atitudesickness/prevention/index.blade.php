@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <h1>Preventions</h1>
        <a class="btn btn-primary mb-3" href="{{ route('admin.preventions.create') }}">Add Prevention</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Prevention Title</th>
                    <th>How to prevent</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                    <tr>
                        <td>{{ $note->title }}</td>
                        <td>{{ $note->text }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('admin.preventions.edit', $note) }}">Edit</a>
                            <form class="d-inline" action="{{ route('admin.preventions.destroy', $note) }}" method="POST"
                                onsubmit="return confirm('Delete this note?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
