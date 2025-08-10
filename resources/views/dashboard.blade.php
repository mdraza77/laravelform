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

    {{-- <header class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0"> 
                        <i class="fas fa-briefcase text-2xl text-indigo-600"></i>
                    </div>
                    <h1 class="ml-3 text-xl font-bold text-gray-900 hidden sm:block">Job Portal</h1>
                </div>

                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        <i class="fas fa-search mr-2"></i>Find Jobs
                    </a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        <i class="fas fa-file-alt mr-2"></i>My Applications
                    </a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        <i class="fas fa-cog mr-2"></i>Settings
                    </a>
                </nav>

                <div class="flex items-center space-x-4">
                    <button class="p-2 text-gray-600 hover:text-indigo-600 transition-colors duration-200">
                        <i class="fas fa-bell text-lg"></i>
                    </button>

                    <div class="relative hidden md:block">
                        <button id="profile-btn-desktop"
                            class="flex items-center space-x-2 text-gray-700 hover:text-indigo-600 transition-colors duration-200">
                            <div
                                class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span class="hidden sm:block font-medium">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                    </div>

                    <button id="mobile-menu-btn" class="md:hidden p-2 text-gray-600 hover:text-indigo-600 transition-colors duration-200">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="md:hidden hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-200">
                    <a href="#" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">
                        <i class="fas fa-search mr-2"></i>Find Jobs
                    </a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">
                        <i class="fas fa-file-alt mr-2"></i>My Applications
                    </a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">
                        <i class="fas fa-cog mr-2"></i>Settings
                    </a>
                </div>
            </div>
        </div>
    </header> --}}

    {{-- Use the reusable header component --}}
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
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <i class="fas fa-briefcase text-blue-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Active Jobs</p>
                            <p class="text-2xl font-bold text-gray-900">2,847</p>
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
                    <div class="space-y-4">
                        <div
                            class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-300">
                            <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                                <div class="flex-1 mb-4 md:mb-0">
                                    <div class="flex items-start md:items-center mb-2">
                                        <div
                                            class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                            <i class="fas fa-code text-blue-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-semibold text-gray-900">Senior Full Stack Developer
                                            </h4>
                                            <p class="text-gray-600">TechCorp Inc.</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <span
                                            class="px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">React</span>
                                        <span
                                            class="px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">Node.js</span>
                                        <span
                                            class="px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">MongoDB</span>
                                    </div>
                                    <div
                                        class="flex flex-col sm:flex-row items-start sm:items-center text-sm text-gray-500 space-y-2 sm:space-y-0 sm:space-x-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-2"></i><span>San Francisco, CA</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-clock mr-2"></i><span>Full-time</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-dollar-sign mr-2"></i><span>$120k - $150k</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-stretch space-y-2 min-w-[120px]">
                                    <button
                                        class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-300">
                                        Apply Now
                                    </button>
                                    <button class="p-2 text-gray-400 hover:text-red-500 transition-colors duration-300">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div
                            class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-300">
                            <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                                <div class="flex-1 mb-4 md:mb-0">
                                    <div class="flex items-start md:items-center mb-2">
                                        <div
                                            class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                            <i class="fas fa-chart-line text-green-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-semibold text-gray-900">Data Scientist</h4>
                                            <p class="text-gray-600">DataFlow Analytics</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <span
                                            class="px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full">Python</span>
                                        <span class="px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full">Machine
                                            Learning</span>
                                        <span
                                            class="px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full">SQL</span>
                                    </div>
                                    <div
                                        class="flex flex-col sm:flex-row items-start sm:items-center text-sm text-gray-500 space-y-2 sm:space-y-0 sm:space-x-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-2"></i><span>New York, NY</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-clock mr-2"></i><span>Full-time</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-dollar-sign mr-2"></i><span>$100k - $130k</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-stretch space-y-2 min-w-[120px]">
                                    <button
                                        class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-300">
                                        Apply Now
                                    </button>
                                    <button
                                        class="p-2 text-gray-400 hover:text-red-500 transition-colors duration-300">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div
                            class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-300">
                            <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                                <div class="flex-1 mb-4 md:mb-0">
                                    <div class="flex items-start md:items-center mb-2">
                                        <div
                                            class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                            <i class="fas fa-palette text-purple-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-semibold text-gray-900">UI/UX Designer</h4>
                                            <p class="text-gray-600">Creative Studios</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <span
                                            class="px-3 py-1 bg-purple-100 text-purple-800 text-sm rounded-full">Figma</span>
                                        <span
                                            class="px-3 py-1 bg-purple-100 text-purple-800 text-sm rounded-full">Adobe
                                            XD</span>
                                        <span
                                            class="px-3 py-1 bg-purple-100 text-purple-800 text-sm rounded-full">Sketch</span>
                                    </div>
                                    <div
                                        class="flex flex-col sm:flex-row items-start sm:items-center text-sm text-gray-500 space-y-2 sm:space-y-0 sm:space-x-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-2"></i><span>Remote</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-clock mr-2"></i><span>Contract</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-dollar-sign mr-2"></i><span>$80k - $110k</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-stretch space-y-2 min-w-[120px]">
                                    <button
                                        class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-300">
                                        Apply Now
                                    </button>
                                    <button
                                        class="p-2 text-gray-400 hover:text-red-500 transition-colors duration-300">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 sm:p-8 lg:p-12 border border-gray-100">
                <div class="text-center">
                    <div
                        class="w-24 h-24 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white font-bold text-3xl">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>

                    <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">{{ Auth::user()->name }}</h3>
                    <p class="text-sm sm:text-base text-gray-600 mb-6">
                        <i class="fas fa-envelope mr-2 text-indigo-500"></i>
                        {{ Auth::user()->email }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <button
                            class="w-full sm:w-auto px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-colors duration-300 flex items-center justify-center">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Profile
                        </button>

                        <form action="{{ route('logout') }}" method="POST" class="inline-block w-full sm:w-auto">
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure you want to logout?')"
                                class="w-full sm:w-auto px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors duration-300 flex items-center justify-center">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="text-center text-gray-500 text-sm">
                <p>&copy; 2024 Job Portal. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- <script>
    // Profile Dropdown Logic
    document.addEventListener('DOMContentLoaded', function () {
        const profileBtn = document.getElementById('profile-btn-desktop');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        let dropdownMenu = document.getElementById('profile-dropdown');
        const userMenuContainer = document.querySelector('.flex.items-center.space-x-4 .relative');

        // Dynamically create and append the dropdown menu
        if (profileBtn && !dropdownMenu) {
            dropdownMenu = document.createElement('div');
            dropdownMenu.id = 'profile-dropdown';
            dropdownMenu.className = 'absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50 hidden';
            dropdownMenu.innerHTML = `
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit Profile</a>
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            `;
            userMenuContainer.appendChild(dropdownMenu);

            profileBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
            });
        }
        
        // Hide dropdown when clicking outside
        document.addEventListener('click', function (e) {
            if (dropdownMenu && !profileBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        // Mobile Navbar Logic
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script> --}}
</body>

</html>
