@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <h1>Cultural Don’ts</h1>
        <a class="btn btn-success mb-3" href="{{ route('admin.culturaldoesnots.create') }}">Add New</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>What Don’t</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($culturalDoNots as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->what_donot }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('admin.culturaldoesnots.edit', $item) }}">Edit</a>
                            <form action="{{ route('admin.culturaldoesnots.destroy', $item) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
