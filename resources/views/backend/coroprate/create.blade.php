@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Item</div>

                    <div class="card-body">
                        <form action="{{ route('admin.corporateresponsibilites.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input class="form-control" type="text" name="title" placeholder="Enter title">
                                @error('title')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" name="description" placeholder="Enter description"></textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                            <a class="btn btn-secondary mt-3"
                                href="{{ route('admin.corporateresponsibilites.index') }}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        input,
        textarea {
            color: black;
        }
    </style>
@endsection
