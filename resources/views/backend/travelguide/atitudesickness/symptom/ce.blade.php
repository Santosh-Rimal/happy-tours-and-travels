@extends('layouts.backend.master')

@section('content')
    <div class="container">
        <h1>{{ isset($symptom) ? 'Edit' : 'Create' }} Symptoms</h1>

        <form method="POST"
            action="{{ isset($symptom) ? route('admin.altitudesickness.update', $symptom) : route('admin.altitudesickness.store') }}">
            @csrf
            @if (isset($symptom))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label" for="title">Title</label>
                <input class="form-control" id="title" type="text" name="title"
                    value="{{ old('title', $symptom->title ?? '') }}" required>
            </div>

            <div class="card mb-3">
                <div class="card-header">Mild Symptoms</div>
                <div class="card-body">
                    <div id="mild-symptoms-container">
                        @php
                            $mildSymptoms = old('mild_symptoms', $symptom->mild_symptoms ?? ['']);
                        @endphp

                        @foreach ($mildSymptoms as $index => $mild_symptom)
                            <div class="input-group mb-2 symptom-group">
                                <input class="form-control" type="text" name="mild_symptoms[]"
                                    value="{{ $mild_symptom }}" placeholder="Enter mild symptom">
                                <button class="btn btn-danger remove-symptom" type="button">×</button>
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-secondary mt-2" id="add-mild-symptom" type="button">+ Add Mild Symptom</button>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">Severe Symptoms</div>
                <div class="card-body">
                    <div id="severe-symptoms-container">
                        @php
                            $severeSymptoms = old('severe_symptoms', $symptom->severe_symptoms ?? ['']);
                        @endphp

                        @foreach ($severeSymptoms as $index => $severe_symptom)
                            <div class="input-group mb-2 symptom-group">
                                <input class="form-control" type="text" name="severe_symptoms[]"
                                    value="{{ $severe_symptom }}" placeholder="Enter severe symptom">
                                <button class="btn btn-danger remove-symptom" type="button">×</button>
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-secondary mt-2" id="add-severe-symptom" type="button">+ Add Severe
                        Symptom</button>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Save</button>
            <a class="btn btn-secondary" href="{{ route('admin.altitudesickness.index') }}">Cancel</a>
        </form>
    </div>

    <style>
        input {
            color: black;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add mild symptom
            document.getElementById('add-mild-symptom').addEventListener('click', function() {
                addSymptomField('mild-symptoms-container', 'mild_symptoms');
            });

            // Add severe symptom
            document.getElementById('add-severe-symptom').addEventListener('click', function() {
                addSymptomField('severe-symptoms-container', 'severe_symptoms');
            });

            // Remove symptom
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-symptom')) {
                    const container = e.target.closest('.symptom-group').parentElement;
                    e.target.closest('.symptom-group').remove();

                    // Ensure at least one field remains
                    if (container.querySelectorAll('.symptom-group').length === 0) {
                        addSymptomField(container.id, container.id.includes('mild') ? 'mild_symptoms' :
                            'severe_symptoms');
                    }
                }
            });

            function addSymptomField(containerId, namePrefix) {
                const container = document.getElementById(containerId);
                const newGroup = document.createElement('div');
                newGroup.className = 'input-group mb-2 symptom-group';
                newGroup.innerHTML = `
            <input type="text" class="form-control" name="${namePrefix}[]" placeholder="Enter ${namePrefix.replace('_', ' ')}">
            <button type="button" class="btn btn-danger remove-symptom">×</button>
        `;
                container.appendChild(newGroup);
                newGroup.querySelector('input').focus();
            }
        });
    </script>
@endsection
