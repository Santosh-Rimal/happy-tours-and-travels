<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md px-6 py-8">
        <!-- Logo/Header -->
        <div class="text-center mb-8">
            <div class="mx-auto w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mb-4">
                <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Welcome back!!</h1>
            <p class="text-gray-600 mt-2">Sign in to your account</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <!-- Error Message -->
            <div class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" id="error-message">
                <span id="error-text"></span>
            </div>

            @error('email')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <span>{{ $message }}</span>
                </div>
            @enderror

            <form class="space-y-6" id="login-form" method="POST" action="{{ route('login.post') }}">
                <!-- Email Field -->
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            id="email" type="email" name="email" placeholder="you@example.com">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600" id="email-error">{{ $message }}</p>
                    @enderror
                    {{-- <p class="mt-1 text-sm text-red-600 hidden" id="email-error">Please enter a valid email address</p> --}}
                </div>

                <!-- Password Field -->
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                        <a class="text-sm text-indigo-600 hover:text-indigo-500" href="#">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            id="password" type="password" name="password" placeholder="••••••••">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600" id="password-error">{{ $message }}</p>
                        @enderror
                        <button class="absolute inset-y-0 right-0 pr-3 flex items-center" id="toggle-password"
                            type="button">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-500"></i>
                        </button>
                    </div>
                    <p class="mt-1 text-sm text-red-600 hidden" id="password-error">Password must be at least 8
                        characters</p>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        id="remember-me" name="remember-me" type="checkbox">
                    <label class="ml-2 block text-sm text-gray-700" for="remember-me">Remember me</label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        type="submit">
                        Sign in
                    </button>
                </div>
            </form>

            <!-- Social Login -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    {{-- <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div> --}}
                </div>

                {{-- <div class="mt-6 grid grid-cols-2 gap-3">
                    <a class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                        href="#">
                        <i class="fab fa-google text-red-500"></i>
                        <span class="ml-2">Google</span>
                    </a>
                    <a class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                        href="#">
                        <i class="fab fa-facebook-f text-blue-600"></i>
                        <span class="ml-2">Facebook</span>
                    </a>
                </div> --}}
            </div>
        </div>

        <!-- Sign Up Link -->
        {{-- <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a class="font-medium text-indigo-600 hover:text-indigo-500" href="#">Sign up</a>
            </p>
        </div> --}}
    </div>

    <script>
        // Password visibility toggle
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye text-gray-400 hover:text-gray-500"></i>' :
                '<i class="fas fa-eye-slash text-gray-400 hover:text-gray-500"></i>';
        });

        // Form validation
        const loginForm = document.getElementById('login-form');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');
        const errorMessage = document.getElementById('error-message');
        const errorText = document.getElementById('error-text');

        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Reset errors
            emailError.classList.add('hidden');
            passwordError.classList.add('hidden');
            errorMessage.classList.add('hidden');

            let isValid = true;

            // Email validation
            if (!emailInput.value || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
                emailError.classList.remove('hidden');
                isValid = false;
            }

            // Password validation
            if (!passwordInput.value || passwordInput.value.length < 8) {
                passwordError.classList.remove('hidden');
                isValid = false;
            }

            if (isValid) {
                // Simulate form submission
                errorText.textContent = 'Login successful! Redirecting...';
                errorMessage.classList.remove('hidden');
                errorMessage.classList.remove('bg-red-100', 'border-red-400', 'text-red-700');
                errorMessage.classList.add('bg-green-100', 'border-green-400', 'text-green-700');

                // In a real app, you would submit the form here
                // loginForm.submit();
            } else {
                errorText.textContent = 'Please fix the errors below.';
                errorMessage.classList.remove('hidden');
            }
        });
    </script>
</body>

</html>
