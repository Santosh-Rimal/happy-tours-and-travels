@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <h1>Trip Request Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $customizetrip->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $customizetrip->email }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $customizetrip->phone }}</p>
                <p class="card-text"><strong>Country:</strong> {{ $customizetrip->country }}</p>
                <p class="card-text"><strong>Trip ID:</strong> {{ $customizetrip->trip_id }}</p>
                <p class="card-text"><strong>Trip Name:</strong> {{ $customizetrip->tripDetail->trip_name }}</p>
                <p class="card-text"><strong>Group Size:</strong> {{ $customizetrip->group_size }}</p>
                <p class="card-text"><strong>Start Date:</strong>
                    {{ $customizetrip->preferred_start_date->format('d M Y') }}
                </p>
                <p class="card-text"><strong>Duration:</strong> {{ $customizetrip->duration }} days</p>
                <p class="card-text"><strong>Budget:</strong> ${{ $customizetrip->budget }}</p>
                <p class="card-text"><strong>Message:</strong> {{ $customizetrip->message }}</p>
            </div>
        </div>

        <a class="btn btn-secondary mt-3" href="{{ route('admin.customizetrips.index') }}">Back to List</a>
    </div>
@endsection
