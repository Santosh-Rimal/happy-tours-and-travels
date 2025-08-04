@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show Item</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"><strong>Title:</strong></label>
                            <p>{{ $item->title }}</p>
                        </div>

                        <div class="form-group">
                            <label for="description"><strong>Description:</strong></label>
                            <p>{{ $item->description }}</p>
                        </div>

                        <a class="btn btn-secondary" href="{{ route('admin.corporateresponsibilites.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
