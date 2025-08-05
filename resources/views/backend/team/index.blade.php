@extends('layouts.backend.master')

@section('content')
    <div class="min-h-screen  py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="border-b border-b-gray-700 px-6 py-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Team Members</h1>
                            <p class="text-blue-100 mt-1">Manage your team members</p>
                        </div>
                        <a class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            href="{{ route('admin.teams.create') }}">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add New
                        </a>
                    </div>
                </div>

                <!-- Team Members List -->
                <div class="px-6 py-8">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                        scope="col">Image</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                        scope="col">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                        scope="col">Position</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                        scope="col">Order</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-300 uppercase tracking-wider"
                                        scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-800 divide-y divide-gray-700">
                                @foreach ($teamMembers as $member)
                                    <tr class="hover:bg-gray-700/50 transition duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <img class="h-10 w-10 rounded-full object-cover border border-gray-600" src="{{ $member->image_url }}"
                                                alt="{{ $member->name }}">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-white">{{ $member->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-400">{{ $member->position }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-400">{{ $member->order }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a class="text-blue-400 hover:text-blue-300 p-2 rounded-md hover:bg-gray-600 transition duration-200 mr-2"
                                                href="{{ route('admin.teams.show', $member->id) }}">View</a>
                                            <a class="text-yellow-400 hover:text-yellow-300 p-2 rounded-md hover:bg-gray-600 transition duration-200 mr-2"
                                                href="{{ route('admin.teams.edit', $member->id) }}">Edit</a>
                                            <form class="inline" action="{{ route('admin.teams.destroy', $member->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-400 hover:text-red-300 p-2 rounded-md hover:bg-gray-600 transition duration-200" type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this team member?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
