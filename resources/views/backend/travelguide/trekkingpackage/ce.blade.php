@extends('layouts.backend.master')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold text-white">
                                @isset($trekking)
                                    Edit Trekking Package
                                @else
                                    Add New Trekking Package
                                @endisset
                            </h1>
                            <p class="text-blue-100 mt-1">Manage Trekking Package details</p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form class="p-6" method="POST"
                    action="@isset($trekking) {{ route('admin.trekkings.update', $trekking->id) }} @else {{ route('admin.trekkings.store') }} @endisset"
                    enctype="multipart/form-data">
                    @csrf
                    @isset($trekking)
                        @method('PUT')
                    @endisset

                    <div class="space-y-6">
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                            <input
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                type="text" name="title" required
                                value="@isset($trekking){{ $trekking->title }}@endisset">
                        </div>

                        <!-- Requirements -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Requirements</label>
                            <div class="space-y-3" id="requirements-container">
                                @isset($trekking)
                                    @foreach ($trekking->requirements as $index => $requirement)
                                        <div class="requirement-item flex space-x-3">
                                            <input
                                                class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                                type="text" name="requirements[{{ $index }}]"
                                                placeholder="Requirement (e.g., Valid passport)" required
                                                value="{{ $requirement }}">
                                            <button
                                                class="px-3 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition"
                                                type="button" onclick="removeRequirementItem(this)">
                                                Remove
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="requirement-item flex space-x-3">
                                        <input
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                            type="text" name="requirements[0]"
                                            placeholder="Requirement (e.g., Valid passport)" required>
                                        <button class="px-3 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition"
                                            type="button" onclick="removeRequirementItem(this)">
                                            Remove
                                        </button>
                                    </div>
                                @endisset
                            </div>
                            <button class="mt-2 px-4 py-2 bg-blue-100 text-blue-600 rounded-md hover:bg-blue-200 transition"
                                type="button" onclick="addRequirementItem()">
                                Add Requirement
                            </button>
                        </div>

                        <!-- Tips -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tips</label>
                            <div class="space-y-3" id="tips-container">
                                @isset($trekking)
                                    @foreach ($trekking->tips as $index => $tip)
                                        <div class="tip-item flex space-x-3">
                                            <input
                                                class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                                type="text" name="tips[{{ $index }}]"
                                                placeholder="Tip (e.g., Bring warm clothing)" required
                                                value="{{ $tip }}">
                                            <button
                                                class="px-3 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition"
                                                type="button" onclick="removeTipItem(this)">
                                                Remove
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="tip-item flex space-x-3">
                                        <input
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                            type="text" name="tips[0]" placeholder="Tip (e.g., Bring warm clothing)"
                                            required>
                                        <button class="px-3 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition"
                                            type="button" onclick="removeTipItem(this)">
                                            Remove
                                        </button>
                                    </div>
                                @endisset
                            </div>
                            <button class="mt-2 px-4 py-2 bg-blue-100 text-blue-600 rounded-md hover:bg-blue-200 transition"
                                type="button" onclick="addTipItem()">
                                Add Tip
                            </button>
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="flex justify-between pt-8 mt-8 border-t border-gray-200">
                        <a class="px-6 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                            href="{{ route('admin.trekkings.index') }}">
                            Cancel
                        </a>
                        <button
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            type="submit">
                            @isset($trekking)
                                Update Trekking Package
                            @else
                                Add Trekking Package
                            @endisset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        input,
        textarea {
            color: black;
        }
    </style>

    <script>
        // Requirements Functions
        function addRequirementItem() {
            const container = document.getElementById('requirements-container');
            const index = container.querySelectorAll('.requirement-item').length;

            const html = `
                <div class="requirement-item flex space-x-3">
                    <input type="text" name="requirements[${index}]" placeholder="Requirement (e.g., Valid passport)" required
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    <button type="button" onclick="removeRequirementItem(this)" 
                            class="px-3 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition">
                        Remove
                    </button>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', html);
        }

        function removeRequirementItem(button) {
            button.closest('.requirement-item').remove();
            reindexItems('requirements-container', 'requirements');
        }

        // Tips Functions
        function addTipItem() {
            const container = document.getElementById('tips-container');
            const index = container.querySelectorAll('.tip-item').length;

            const html = `
                <div class="tip-item flex space-x-3">
                    <input type="text" name="tips[${index}]" placeholder="Tip (e.g., Bring warm clothing)" required
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    <button type="button" onclick="removeTipItem(this)" 
                            class="px-3 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition">
                        Remove
                    </button>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', html);
        }

        function removeTipItem(button) {
            button.closest('.tip-item').remove();
            reindexItems('tips-container', 'tips');
        }

        // Generic reindex function for both requirements and tips
        function reindexItems(containerId, fieldName) {
            const container = document.getElementById(containerId);
            const items = container.querySelectorAll(`.${fieldName}-item`);

            items.forEach((item, index) => {
                const input = item.querySelector(`input[name^="${fieldName}["]`);
                input.name = `${fieldName}[${index}]`;
            });
        }
    </script>
@endsection
