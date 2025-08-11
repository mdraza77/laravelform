<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }} at {{ $job->company }}</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <x-header />

    <main class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-8">
                <!-- Header -->
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mr-6 flex-shrink-0">
                        <i class="fas fa-briefcase text-blue-600 text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ $job->title }}</h1>
                        <p class="text-lg text-gray-600">{{ $job->company }}</p>
                    </div>
                </div>

                <!-- Job Details -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm text-gray-600 mb-6">
                    <div class="flex items-center"><i class="fas fa-map-marker-alt w-5 mr-2 text-gray-400"></i>
                        {{ $job->location }}</div>
                    <div class="flex items-center"><i class="fas fa-clock w-5 mr-2 text-gray-400"></i>
                        {{ $job->employment_type }}</div>
                    @if ($job->salary_range)
                        <div class="flex items-center"><i class="fas fa-dollar-sign w-5 mr-2 text-gray-400"></i>
                            {{ $job->salary_range }}</div>
                    @endif
                </div>

                <!-- Job Description -->
                <div class="prose max-w-none text-gray-700 mb-6">
                    <h3 class="font-semibold text-gray-800">Job Description</h3>
                    <p>{{ $job->description }}</p>
                </div>

                <!-- Skills -->
                <div>
                    <h3 class="font-semibold text-gray-800 mb-2">Required Skills</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach (explode(',', $job->skills) as $skill)
                            <span
                                class="px-3 py-1 bg-indigo-100 text-indigo-800 text-sm font-medium rounded-full">{{ trim($skill) }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Apply Footer -->
            <div class="bg-gray-50 p-6 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center">
                <div>
                    <p class="text-sm text-gray-600">Posted by: <span
                            class="font-semibold">{{ $job->user->name }}</span></p>
                    <p class="text-xs text-gray-500">Posted on {{ $job->created_at->format('F d, Y') }}</p>
                </div>
                <button
                    class="mt-4 sm:mt-0 w-full sm:w-auto px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">
                    Apply Now
                </button>
            </div>
        </div>
    </main>
</body>

</html>
