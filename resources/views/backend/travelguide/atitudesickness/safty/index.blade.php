@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Safety Measures list</h1>
            <a class="btn btn-primary" href="{{ route('admin.safetymeasures.create') }}">Create New</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Requirements</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($safties as $safe)
                        <tr>
                            <td>{{ $safe->title }}</td>
                            <td>
                                <ul class="mb-0">
                                    @foreach ($safe->requirements as $requirement)
                                        <li>{{ $requirement }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('admin.safetymeasures.edit', $safe) }}">Edit</a>
                                    <form action="{{ route('admin.safetymeasures.destroy', $safe) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="4">No Safety Measurefound.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
