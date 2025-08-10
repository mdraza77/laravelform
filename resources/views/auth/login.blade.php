<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- Make sure you have Tailwind CSS included --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    {{-- The main container for the login card --}}
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">

        {{-- 1. Heading Added --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Sign In</h1>
        </div>

        {{-- Your original form is placed here without changes to its internal structure --}}
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf


            <label>Email</label>
            <input type="email" name="email" placeholder="email@example.com" value="{{ old('email') }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label>Password</label>
            <input type="password" name="password" placeholder="******"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition font-semibold">
                Login
            </button>
        </form>

        {{-- 2. Link to Register Page Added --}}
        <div class="text-center text-sm text-gray-600 mt-6">
            <p>
                Don't have an account?
                <a href="{{ route('register') }}"
                    class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline">
                    Register here
                </a>
            </p>
        </div>

    </div>
</body>

</html>
