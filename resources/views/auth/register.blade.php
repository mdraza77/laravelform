<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    
    {{-- Main container for the registration card --}}
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">

        {{-- 1. Heading Added --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Create Account</h1>
        </div>

        <form action="{{route('register')}}" method="POST" class="space-y-4">
            @csrf

            {{-- Name Field with Label --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input id="name" type="text" name="name" placeholder="Your Name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email Field with Label --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" placeholder="email@example.com" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password Field with Label --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" placeholder="Create a Password"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password Field with Label --}}
            <div>
                 <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition font-semibold">
                Register
            </button>
        </form>

        {{-- 2. Link to Login Page Added --}}
        <div class="text-center text-sm text-gray-600 mt-6">
            <p>
                Already have an account?
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline">
                    Sign In
                </a>
            </p>
        </div>

    </div>
</body>
</html>