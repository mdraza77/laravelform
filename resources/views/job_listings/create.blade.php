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
        <div class="bg-white shadow-md rounded-lg p-8 max-w-4xl w-full">
            {{-- Max-width badhaya gaya hai grid ke liye --}}
            <h1 class="text-2xl font-bold mb-6 text-center">Publish a New Job</h1>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- 1. Form tag ko grid container banaya gaya hai. space-y-4 ko hata kar gap-6 add kiya hai. --}}
            <form action="{{ route('job-listings.store') }}" method="POST" class="grid md:grid-cols-2 gap-6">
                @csrf

                {{-- Title Field (Column 1) --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                    <input id="title" type="text" name="title" placeholder="e.g., Senior Laravel Developer"
                        value="{{ old('title') }}"
                        class="w-full border rounded px-3 py-2 @error('title') border-red-500 @enderror" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Company Field (Column 2) --}}
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                    <input id="company" type="text" name="company" placeholder="e.g., Tech Corp"
                        value="{{ old('company') }}"
                        class="w-full border rounded px-3 py-2 @error('company') border-red-500 @enderror" required>
                    @error('company')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Location Field (Column 1) --}}
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <input id="location" type="text" name="location" placeholder="e.g., 'New York, NY' or 'Remote'"
                        value="{{ old('location') }}"
                        class="w-full border rounded px-3 py-2 @error('location') border-red-500 @enderror" required>
                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Employment Type Dropdown (Column 2) --}}
                <div>
                    <label for="employment_type" class="block text-sm font-medium text-gray-700 mb-1">Employment
                        Type</label>
                    <select id="employment_type" name="employment_type"
                        class="w-full border rounded px-3 py-2 @error('employment_type') border-red-500 @enderror"
                        required>
                        <option value="" disabled {{ old('employment_type') ? '' : 'selected' }}>Select Employment
                            Type</option>
                        <option value="Full-time" {{ old('employment_type') == 'Full-time' ? 'selected' : '' }}>
                            Full-time</option>
                        <option value="Part-time" {{ old('employment_type') == 'Part-time' ? 'selected' : '' }}>
                            Part-time</option>
                        <option value="Contract" {{ old('employment_type') == 'Contract' ? 'selected' : '' }}>Contract
                        </option>
                        <option value="Internship" {{ old('employment_type') == 'Internship' ? 'selected' : '' }}>
                            Internship</option>
                        <option value="Temporary" {{ old('employment_type') == 'Temporary' ? 'selected' : '' }}>
                            Temporary</option>
                    </select>
                    @error('employment_type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Salary Range Field (Full Width) --}}
                {{-- 2. Yeh field poori width lega isliye 'md:col-span-2' add kiya hai --}}
                <div class="md:col-span-2">
                    <label for="salary_range" class="block text-sm font-medium text-gray-700 mb-1">Salary Range
                        (Optional)</label>
                    <input id="salary_range" type="text" name="salary_range"
                        placeholder="e.g., '$100k - $130k' or '₹8LPA - ₹12LPA'" value="{{ old('salary_range') }}"
                        class="w-full border rounded px-3 py-2 @error('salary_range') border-red-500 @enderror">
                    @error('salary_range')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Job Description Field (Full Width) --}}
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Job
                        Description</label>
                    <textarea id="description" name="description" placeholder="Describe the job role, responsibilities, and requirements..."
                        class="w-full border rounded px-3 py-2 @error('description') border-red-500 @enderror" rows="2" required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Skills Field (Full Width) --}}
                <div class="md:col-span-2">
                    <label for="skills" class="block text-sm font-medium text-gray-700 mb-1">Required Skills</label>
                    <textarea id="skills" name="skills" placeholder="e.g., PHP, Laravel, MySQL, JavaScript, Tailwind CSS"
                        class="w-full border rounded px-3 py-2 @error('skills') border-red-500 @enderror" rows="2" required>{{ old('skills') }}</textarea>
                    @error('skills')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button (Full Width) --}}
                <div class="md:col-span-2">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white px-4 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors duration-300">
                        Publish Job
                    </button>
                </div>
            </form>
        </div>
    </main>

    {{-- You can also add a reusable footer if you have one --}}
    <x-footer />

</body>

</html>
