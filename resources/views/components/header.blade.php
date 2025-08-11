<header class="bg-white shadow-lg border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-briefcase text-2xl text-indigo-600"></i>
                </div>
                <h1 class="ml-3 text-xl font-bold text-gray-900 hidden sm:block">Job Portal</h1>
            </div>

            <nav class="hidden md:flex space-x-8">
                <a href="{{url('/dashboard')}}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    <i class="fas fa-home mr-2"></i>Dashboard
                </a>
                <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    <i class="fas fa-search mr-2"></i>Find Jobs
                </a>
                <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    <i class="fas fa-file-alt mr-2"></i>My Applications
                </a>
                <a href="{{route('settings.index')}}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    <i class="fas fa-cog mr-2"></i>Settings
                </a>
            </nav>

            <div class="flex items-center space-x-4">
                <button class="p-2 text-gray-600 hover:text-indigo-600 transition-colors duration-200">
                    <i class="fas fa-bell text-lg"></i>
                </button>

                {{-- Authenticated User Dropdown --}}
                @auth
                <div class="relative hidden md:block">
                    <button id="profile-btn-desktop" class="flex items-center space-x-2 text-gray-700 hover:text-indigo-600 transition-colors duration-200">
                        <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <span class="hidden sm:block font-medium">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    {{-- Dropdown Menu is created by JS below --}}
                </div>
                @endauth

                <button id="mobile-menu-btn" class="md:hidden p-2 text-gray-600 hover:text-indigo-600 transition-colors duration-200">
                    <i class="fas fa-bars text-lg"></i>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
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
</header>

<script>
// Use a self-invoking function to avoid polluting the global scope
(function() {
    const profileBtn = document.getElementById('profile-btn-desktop');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    let dropdownMenu = document.getElementById('profile-dropdown');
    
    // Check if profile button exists (user is authenticated)
    if (profileBtn && !dropdownMenu) {
        const userMenuContainer = profileBtn.parentElement;

        dropdownMenu = document.createElement('div');
        dropdownMenu.id = 'profile-dropdown';
        dropdownMenu.className = 'absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50 hidden';
        dropdownMenu.innerHTML = `
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit Profile</a>
            <form action="{{ route('logout') }}" method="POST" class="block">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
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
        if (dropdownMenu && profileBtn && !profileBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });

    // Mobile Navbar Logic
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }
})();
</script>