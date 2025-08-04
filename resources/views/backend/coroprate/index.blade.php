@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Items</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a class="btn btn-primary mb-3" href="{{ route('admin.corporateresponsibilites.create') }}">Create New
                            Item</a>

                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <form action="{{ route('admin.corporateresponsibilites.destroy', $item->id) }}"
                                            method="POST">
                                            <a class="btn btn-info"
                                                href="{{ route('admin.corporateresponsibilites.show', $item->id) }}">Show</a>
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.corporateresponsibilites.edit', $item->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {!! $items->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
