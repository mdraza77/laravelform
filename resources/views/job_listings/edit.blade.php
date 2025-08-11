<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Listing</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <x-header />

    <main class="flex-grow flex items-center justify-center p-4">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-4xl w-full">
            <h1 class="text-2xl font-bold mb-6 text-center">Edit Job: {{ $job->title }}</h1>

            {{-- 1. Form action aur method ko update karein --}}
            <form action="{{ route('job-listings.update', $job->id) }}" method="POST"
                class="grid md:grid-cols-2 gap-6">
                @csrf
                @method('PUT') {{-- HTML form PUT request support nahi karte, isliye yeh zaroori hai --}}

                {{-- Title Field --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                    {{-- 2. 'value' attribute mein purana data bharein --}}
                    <input id="title" type="text" name="title" value="{{ old('title', $job->title) }}"
                        class="w-full border rounded px-3 py-2" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Company Field --}}
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                    <input id="company" type="text" name="company" value="{{ old('company', $job->company) }}"
                        class="w-full border rounded px-3 py-2" required>
                    @error('company')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Location Field --}}
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <input id="location" type="text" name="location" value="{{ old('location', $job->location) }}"
                        class="w-full border rounded px-3 py-2" required>
                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Employment Type Dropdown --}}
                <div>
                    <label for="employment_type" class="block text-sm font-medium text-gray-700 mb-1">Employment
                        Type</label>
                    <select id="employment_type" name="employment_type" class="w-full border rounded px-3 py-2"
                        required>
                        @php
                            $types = ['Full-time', 'Part-time', 'Contract', 'Internship', 'Temporary'];
                            $currentType = old('employment_type', $job->employment_type);
                        @endphp
                        @foreach ($types as $type)
                            <option value="{{ $type }}" {{ $currentType == $type ? 'selected' : '' }}>
                                {{ $type }}</option>
                        @endforeach
                    </select>
                    @error('employment_type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Salary Range Field --}}
                <div class="md:col-span-2">
                    <label for="salary_range" class="block text-sm font-medium text-gray-700 mb-1">Salary Range
                        (Optional)</label>
                    <input id="salary_range" type="text" name="salary_range"
                        value="{{ old('salary_range', $job->salary_range) }}" class="w-full border rounded px-3 py-2">
                    @error('salary_range')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Job Description Field --}}
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Job
                        Description</label>
                    <textarea id="description" name="description" class="w-full border rounded px-3 py-2" rows="6" required>{{ old('description', $job->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Skills Field --}}
                <div class="md:col-span-2">
                    <label for="skills" class="block text-sm font-medium text-gray-700 mb-1">Required Skills</label>
                    <textarea id="skills" name="skills" class="w-full border rounded px-3 py-2" rows="3" required>{{ old('skills', $job->skills) }}</textarea>
                    @error('skills')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="md:col-span-2">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white px-4 py-3 rounded-lg font-semibold hover:bg-indigo-700">
                        Update Job
                    </button>
                </div>
            </form>
        </div>
    </main>

    <x-footer />
</body>

</html>
