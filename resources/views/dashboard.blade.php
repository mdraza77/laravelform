<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - {{ Auth::user()->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center font-sans">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full text-center">
        <h1 class="text-4xl font-semibold mb-6 text-gray-800">
            Welcome, {{ Auth::user()->name }}
        </h1>
        <p class="mb-2 text-2xl">Your registered email id is <span class="text-blue-900 hover:text-blue-700">{{ Auth::user()->email }}</span></p>
        <form action="{{ route('logout') }}" method="POST" class="inline-block">
            @csrf
            <button type="submit" onclick="return confirm('Are you sure you want to log)"
                class="px-6 py-3 bg-red-600 text-white font-medium rounded-md hover:bg-red-700 transition-colors duration-300">
                Logout
            </button>
        </form>
    </div>
</body>

</html>
