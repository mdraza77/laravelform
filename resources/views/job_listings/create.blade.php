<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Job Listing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Assuming you have Font Awesome and a shared CSS file --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    {{-- 1. Add the reusable header component here --}}
    <x-header />

    {{-- 2. Wrap the main content in a <main> tag for better structure --}}
    <main class="flex-grow flex items-center justify-center p-4">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-lg w-full">
            <h1 class="text-2xl font-bold mb-6 text-center">Publish a New Job</h1>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('job-listings.store') }}" method="POST" class="space-y-4">
                @csrf

                <input type="text" name="title" placeholder="Job Title" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500" required>
                <input type="text" name="company" placeholder="Company Name" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500" required>
                <input type="text" name="location" placeholder="Job Location (e.g., 'New York, NY' or 'Remote')" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500" required>
                <input type="text" name="employment_type" placeholder="Employment Type (e.g., 'Full-time')" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500" required>
                <input type="text" name="salary_range" placeholder="Salary Range (e.g., '$100k - $130k')" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500">
                <textarea name="skills" placeholder="Required Skills (comma separated)" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500" required></textarea>

                <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors duration-300">
                    Publish Job
                </button>
            </form>
        </div>
    </main>

    {{-- You can also add a reusable footer if you have one --}}
    {{-- <x-footer /> --}}

</body>
</html>