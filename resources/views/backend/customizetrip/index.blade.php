@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <h1 class="my-4">Custom Trip Requests</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Trip ID</th>
                    <th>Start Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trips as $trip)
                    <tr>
                        <td>{{ $trip->id }}</td>
                        <td>{{ $trip->name }}</td>
                        <td>{{ $trip->email }}</td>
                        <td>{{ $trip->tripDetail->trip_name }}</td>
                        <td>{{ $trip->preferred_start_date->format('d M Y') }}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('admin.customizetrips.show', $trip) }}">View</a>
                            <form class="d-inline" action="{{ route('admin.customizetrips.destroy', $trip) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
