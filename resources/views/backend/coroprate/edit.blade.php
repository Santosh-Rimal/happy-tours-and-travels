@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Item</div>

                    <div class="card-body">
                        <form action="{{ route('admin.corporateresponsibilites.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input class="form-control" type="text" name="title" value="{{ $item->title }}"
                                    placeholder="Enter title">
                                @error('title')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" name="description" placeholder="Enter description">{{ $item->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mt-3" type="submit">Update</button>
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
