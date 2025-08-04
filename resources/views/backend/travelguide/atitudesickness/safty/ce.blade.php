@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <h1>{{ isset($safty) ? 'Edit' : 'Create' }} Safety Measure</h1>

        <form method="POST"
            action="{{ isset($safty) ? route('admin.safetymeasures.update', $safty) : route('admin.safetymeasures.store') }}">
            @csrf
            @if (isset($safty))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label" for="title">Title</label>
                <input class="form-control" id="title" type="text" name="title"
                    value="{{ old('title', $safty->title ?? '') }}" required>
            </div>

            <div class="card mb-3">
                <div class="card-header">Requirements</div>
                <div class="card-body">
                    <div id="requirements-container">
                        @php
                            $requirements = old('requirements', $safty->requirements ?? ['']);
                        @endphp

                        @foreach ($requirements as $requirement)
                            <div class="input-group mb-2 requirement-group">
                                <input class="form-control" type="text" name="requirements[]" value="{{ $requirement }}"
                                    placeholder="Enter requirement">
                                <button class="btn btn-danger remove-requirement" type="button">×</button>
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-secondary mt-2" id="add-requirement" type="button">+ Add Requirement</button>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">{{ isset($safty) ? 'Update' : 'Save' }}</button>
            <a class="btn btn-secondary" href="{{ route('admin.safetymeasures.index') }}">Cancel</a>
        </form>
    </div>

    <style>
        input {
            color: black;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add requirement
            document.getElementById('add-requirement').addEventListener('click', function() {
                addRequirementField();
            });

            // Remove requirement
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-requirement')) {
                    const container = e.target.closest('.requirement-group').parentElement;
                    e.target.closest('.requirement-group').remove();

                    // Ensure at least one input remains
                    if (container.querySelectorAll('.requirement-group').length === 0) {
                        addRequirementField();
                    }
                }
            });

            function addRequirementField() {
                const container = document.getElementById('requirements-container');
                const newGroup = document.createElement('div');
                newGroup.className = 'input-group mb-2 requirement-group';
                newGroup.innerHTML = `
                    <input type="text" class="form-control" name="requirements[]" placeholder="Enter requirement">
                    <button type="button" class="btn btn-danger remove-requirement">×</button>
                `;
                container.appendChild(newGroup);
                newGroup.querySelector('input').focus();
            }
        });
    </script>
@endsection
