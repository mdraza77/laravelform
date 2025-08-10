<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Job Listings</title>
    @vite('resources/css/app.css')
    {{-- Font Awesome for icons --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
    {{-- Reusable Header --}}
    <x-header />

    <main class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Manage Job Listings</h1>
                <p class="text-gray-600 mt-1">View, edit, or delete your posted jobs.</p>
            </div>
            <a href="{{ route('job-listings.create') }}"
                class="w-full sm:w-auto bg-indigo-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition flex items-center justify-center shadow-sm">
                <i class="fas fa-plus mr-2"></i> Post a New Job
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6 shadow-sm"
                role="alert">
                <p class="font-bold">Success</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- Job Listings Section --}}
        @if ($jobs->isEmpty())
            {{-- Empty State --}}
            <div class="text-center bg-white p-12 rounded-lg shadow-md">
                <i class="fas fa-briefcase text-4xl text-gray-400 mb-4"></i>
                <h2 class="text-2xl font-semibold text-gray-700">No Jobs Posted Yet</h2>
                <p class="text-gray-500 mt-2">Ready to find the perfect candidate? Post your first job now.</p>
                <a href="{{ route('job-listings.create') }}"
                    class="mt-6 inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                    Post a Job
                </a>
            </div>
        @else
            {{-- Responsive Grid for Job Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($jobs as $job)
                    <div
                        class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col">
                        <div class="p-6 flex-grow">
                            <div class="flex justify-between items-start">
                                <h2 class="text-xl font-bold text-gray-900 mb-1">{{ $job->title }}</h2>
                                <span
                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-indigo-600 bg-indigo-200">
                                    {{ $job->employment_type }}
                                </span>
                            </div>
                            <p class="text-md text-gray-700 font-medium">{{ $job->company }}</p>

                            <div class="mt-4 space-y-2 text-sm text-gray-600">
                                <p class="flex items-center"><i
                                        class="fas fa-map-marker-alt w-5 mr-2 text-gray-400"></i> {{ $job->location }}
                                </p>
                                @if ($job->salary_range)
                                    <p class="flex items-center"><i
                                            class="fas fa-dollar-sign w-5 mr-2 text-gray-400"></i>
                                        {{ $job->salary_range }}</p>
                                @endif
                                <p class="flex items-center"><i class="fas fa-clock w-5 mr-2 text-gray-400"></i> Posted
                                    {{ $job->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        {{-- Action Buttons Footer --}}
                        <div class="bg-gray-50 p-4 border-t border-gray-100 flex items-center justify-end space-x-3">
                            <a href="{{ route('job-listings.edit', $job->id) }}"
                                class="flex items-center px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition text-sm font-medium">
                                <i class="fas fa-pencil-alt mr-2"></i> Edit
                            </a>
                            <form action="{{ route('job-listings.destroy', $job->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this job? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition text-sm font-medium">
                                    <i class="fas fa-trash-alt mr-2"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Pagination Links --}}
        <div class="mt-8">
            {{-- Use this if you implement pagination in your controller --}}
            {{ $jobs->links() }}
        </div>
    </main>
</body>

</html>
