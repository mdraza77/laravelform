<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Job Portal Dashboard - {{ Auth::user()->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex flex-col">
    <x-header />
    <main class="flex-1 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Welcome back, {{ Auth::user()->name }}! 👋
                </h2>
                <p class="text-sm sm:text-base text-gray-600">Ready to find your next career opportunity? Here's your
                    job search overview.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div
                    class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center" title="Total {{ $totalJobCount }} active jobs">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <i class="fas fa-briefcase text-blue-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Active Jobs</p>
                            <p class="text-2xl font-bold text-gray-900">
                                {{ $totalJobCount }}</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <i class="fas fa-paper-plane text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Applications</p>
                            <p class="text-2xl font-bold text-gray-900">12</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-lg">
                            <i class="fas fa-eye text-purple-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Profile Views</p>
                            <p class="text-2xl font-bold text-gray-900">89</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-orange-100 rounded-lg">
                            <i class="fas fa-star text-orange-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Saved Jobs</p>
                            <p class="text-2xl font-bold text-gray-900">24</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-3">
                    <button
                        class="flex items-center justify-center px-4 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-300">
                        <i class="fas fa-search mr-2"></i>Search Jobs
                    </button>
                    <a href="{{ url('/jobs/create') }}"
                        class="flex items-center justify-center px-4 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-300">
                        <i class="fas fa-plus mr-2"></i>Post Job
                    </a>
                    <a href="{{ url('/job-listings') }}"
                        class="flex items-center justify-center px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300">
                        <i class="fas fa-eye mr-2"></i>View Jobs
                    </a>
                    <button
                        class="flex items-center justify-center px-4 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-300">
                        <i class="fas fa-upload mr-2"></i>Upload Resume
                    </button>
                    <button
                        class="flex items-center justify-center px-4 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors duration-300">
                        <i class="fas fa-heart mr-2"></i>Saved Jobs
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md border border-gray-100 mb-8">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2 sm:mb-0">Featured Jobs</h3>
                        <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">View All Jobs</a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        @if ($jobs->isEmpty())
                            <p class="text-center text-gray-500 py-10">No other jobs available at the moment. Check back later!</p>
                        @else
                            @foreach ($jobs as $job)
                                <!-- The entire card is now a clickable link -->
                                <a href="{{ route('jobs.show', $job->id) }}" class="block border border-gray-200 rounded-lg p-4 hover:shadow-md hover:border-indigo-300 transition-all duration-300">
                                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                                        <div class="flex-1">
                                            <!-- Job Title and Company -->
                                            <div class="flex items-center mb-3">
                                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                                    <i class="fas fa-briefcase text-blue-600 text-xl"></i>
                                                </div>
                                                <div>
                                                    <h4 class="text-lg font-semibold text-gray-900">{{ $job->title }}</h4>
                                                    <p class="text-gray-600">{{ $job->company }}</p>
                                                </div>
                                            </div>
                
                                            <!-- Job Details -->
                                            <div class="flex flex-wrap gap-x-4 gap-y-2 text-sm text-gray-500">
                                                <div class="flex items-center"><i class="fas fa-map-marker-alt mr-2"></i><span>{{ $job->location }}</span></div>
                                                <div class="flex items-center"><i class="fas fa-clock mr-2"></i><span>{{ $job->employment_type }}</span></div>
                                                @if($job->salary_range)
                                                    <div class="flex items-center"><i class="fas fa-dollar-sign mr-2"></i><span>{{ $job->salary_range }}</span></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>

                    {{-- Pagination Links --}}
                    <div class="mt-8">
                        {{ $jobs->links() }}
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-2xl mx-auto border border-gray-100">
                <div class="flex flex-col md:flex-row items-center md:space-x-8">

                    <!-- User Avatar -->
                    <div class="flex-shrink-0 mb-6 md:mb-0">
                        <div
                            class="w-28 h-28 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center shadow-md">
                            <!-- Changed text-red-700 to text-white for better contrast -->
                            <span
                                class="text-green-700 hover:text-green-800 font-bold text-5xl">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                    </div>

                    <!-- User Details and Actions -->
                    <div class="text-center md:text-left flex-grow">
                        <h3 class="text-3xl font-bold text-gray-900">{{ Auth::user()->name }}</h3>
                        <p class="text-base text-gray-500 mt-1 mb-6">
                            <i class="fas fa-envelope mr-2 text-gray-400"></i>
                            {{ Auth::user()->email }}
                        </p>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            <button
                                class="w-full sm:w-auto px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-all duration-300 flex items-center justify-center shadow-sm hover:shadow-md">
                                <i class="fas fa-edit mr-2"></i>
                                Edit Profile
                            </button>

                            <form action="{{ route('logout') }}" method="POST"
                                class="inline-block w-full sm:w-auto">
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure you want to logout?')"
                                    class="w-full sm:w-auto px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-all duration-300 flex items-center justify-center shadow-sm hover:shadow-md">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <x-footer />
</body>

</html>
