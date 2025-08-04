@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Symptoms List</h1>
            <a class="btn btn-primary" href="{{ route('admin.altitudesickness.create') }}">Create New</a>
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
                        <th>Mild Symptoms</th>
                        <th>Severe Symptoms</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($symptoms as $symptom)
                        <tr>
                            <td>{{ $symptom->title }}</td>
                            <td>
                                <ul class="mb-0">
                                    @foreach ($symptom->mild_symptoms as $mild_symptom)
                                        <li>{{ $mild_symptom }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul class="mb-0">
                                    @foreach ($symptom->severe_symptoms as $severe_symptom)
                                        <li>{{ $severe_symptom }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('admin.altitudesickness.edit', $symptom) }}">Edit</a>
                                    <form action="{{ route('admin.altitudesickness.destroy', $symptom) }}" method="POST">
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
                            <td class="text-center" colspan="4">No symptoms found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
