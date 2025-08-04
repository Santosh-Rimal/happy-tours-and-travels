     <!DOCTYPE html>
     <html class="dark" lang="en">

     <head>
         <meta charset="UTF-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <title>@yield('title', 'Hamro Tours and Travel')</title>

         <link rel="icon" type="image/png" sizes="any" href="{{ asset('logos/futsalmate_icon.png') }}">
         {{-- Dropify --}}
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
         <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
         <script src="https://cdn.tailwindcss.com"></script>
         <style>
             .category {
                 display: inline;
             }

             .ck-editor__editable[role="textbox"] {
                 min-height: 300px;
                 color: black;
             }

             .ck-content .image {
                 max-width: 80%;
                 margin: 20px auto;
             }

             body {
                 font-family: Arial, sans-serif;
                 margin: 40px;
                 background: #f3f4f6;
             }

             .form-container {
                 background: white;
                 padding: 20px;
                 border-radius: 12px;
                 box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                 max-width: 800px;
                 margin: auto;
             }

             input,
             textarea {
                 width: 100%;
                 margin-bottom: 12px;
                 padding: 10px;
                 border: 1px solid #ccc;
                 border-radius: 6px;
             }

             aside::-webkit-scrollbar {
                 width: 2px;
             }

             aside::-webkit-scrollbar-thumb {
                 background: #4B5563;
                 /* Tailwind's gray-600 color */
                 border-radius: 9999px;
             }
         </style>

         <script>
             tailwind.config = {
                 darkMode: 'class',
             }
         </script>
         @vite('resources/js/app.js', 'resources/css/app.css')
         @stack('styles')
     </head>

     <body class="bg-black text-white font-sans">
         <div class="flex h-screen overflow-hidden">
             <!-- Mobile Header -->
             <header
                 class="fixed top-0 left-0 right-0 z-50 bg-gray-900 text-white md:hidden flex justify-between items-center p-4 shadow">
                 <div class="flex items-center space-x-3">
                     <button class="text-white focus:outline-none" id="mobileMenuToggle">
                         <!-- Hamburger Icon -->
                         <svg class="w-6 h-6" id="menuOpenIcon" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                             <path d="M4 6h16M4 12h16M4 18h16" />
                         </svg>
                         <!-- Close Icon (hidden initially) -->
                         <svg class="w-6 h-6 hidden" id="menuCloseIcon" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                             <path d="M6 18L18 6M6 6l12 12" />
                         </svg>
                     </button>
                     <img class="h-10 w-auto object-contain" src="{{ asset('logos/futsalmate_logo.png') }}"
                         alt="futsalmatelogo">
                 </div>
                 <div class="flex items-center space-x-2">
                     <img class="w-12 h-12 rounded-full object-cover shadow-xl" src="https://i.pravatar.cc/40"
                         alt="Profile Picture" />
                 </div>
             </header>

             @includeIf('layouts.backend.sidebar')

             <!-- Main Content Area -->
             <div class="flex-1 flex flex-col overflow-hidden pt-16 md:pt-0">
                 <!-- Desktop Header -->
                 <header
                     class="hidden md:flex items-center justify-between bg-gray-800 px-6 py-4 border-b border-gray-700">
                     <h1 class="text-xl font-semibold">Welcome, Admin</h1>
                     <div class="flex items-center space-x-4">
                         <img class="h-8 w-auto" src="{{ asset('logos/futsalmate_logo.png') }}" alt="Logo">
                         <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/40" alt="Admin Profile">
                     </div>
                 </header>

                 <!-- Main Content -->
                 <main class="flex-1 overflow-y-auto p-4 md:p-6">
                     @yield('content')
                 </main>
             </div>
         </div>

         {{-- Dropify for upload image --}}
         <script>
             $('.dropify').dropify();
             document.addEventListener('DOMContentLoaded', function() {
                 const mobileMenuToggle = document.getElementById('mobileMenuToggle');
                 const mobileSidebar = document.getElementById('mobileSidebar');
                 const menuOpenIcon = document.getElementById('menuOpenIcon');
                 const menuCloseIcon = document.getElementById('menuCloseIcon');
                 let isMenuOpen = false;

                 // Toggle mobile menu
                 mobileMenuToggle.addEventListener('click', function(e) {
                     e.stopPropagation(); // Prevent event from bubbling to document

                     isMenuOpen = !isMenuOpen;

                     if (isMenuOpen) {
                         mobileSidebar.classList.remove('-translate-y-full');
                         menuOpenIcon.classList.add('hidden');
                         menuCloseIcon.classList.remove('hidden');
                         document.body.style.overflow = 'hidden';
                     } else {
                         mobileSidebar.classList.add('-translate-y-full');
                         menuOpenIcon.classList.remove('hidden');
                         menuCloseIcon.classList.add('hidden');
                         document.body.style.overflow = '';
                     }
                 });

                 // Close menu when clicking outside
                 document.addEventListener('click', function(e) {
                     if (isMenuOpen &&
                         !mobileSidebar.contains(e.target) &&
                         e.target !== mobileMenuToggle &&
                         !mobileMenuToggle.contains(e.target)) {
                         mobileSidebar.classList.add('-translate-y-full');
                         menuOpenIcon.classList.remove('hidden');
                         menuCloseIcon.classList.add('hidden');
                         document.body.style.overflow = '';
                         isMenuOpen = false;
                     }
                 });
             });
         </script>

         @stack('scripts')
     </body>

     </html>
