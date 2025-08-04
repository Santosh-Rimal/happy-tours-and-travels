<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>

    <!-- Frontend Nav -->
    <nav class="bg-gray-800 text-white p-4">
        <ul class="flex gap-4">
            <li><a class="hover:underline" href="">Home</a></li>
            <li><a class="hover:underline" href="{{ route('frontend.blogs') }}">Blogs</a></li>
            <li><a class="hover:underline" href="{{ route('frontend.travel.guide') }}">Travel Guide</a></li>
            <li><a class="hover:underline" href="{{ route('frontend.contact.us') }}">Contact Us</a></li>
        </ul>
    </nav>

    <!-- Admin Nav -->
    <nav class="bg-gray-900 text-white p-4 mt-4">
        <ul class="flex gap-4">
            <li><a class="hover:underline" href="{{ route('dashboard') }}">Admin Dashboard</a></li>
            <li><a class="hover:underline" href="{{ route('admin.tripdetails.index') }}">Trip Detail Index</a></li>
            <li><a class="hover:underline" href="{{ route('create') }}">Create Trip Detail</a></li>
            <li><a class="hover:underline" href="{{ route('edit') }}">Edit Trip Detail</a></li>
            <li><a class="hover:underline" href="{{ route('show') }}">Show Trip Detail</a></li>
        </ul>
    </nav>

</body>

</html>
