<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm space-y-4">
        @csrf

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('email')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror

        <input type="password" name="password" placeholder="Password"
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('password')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
            Login
        </button>
    </form>
</body>

</html>
