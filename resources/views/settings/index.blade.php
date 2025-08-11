<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <x-header />

    <main class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Settings</h1>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- User Profile Section -->
        <div class="bg-white rounded-xl shadow-md p-8 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">My Profile</h2>
            <div class="flex items-center space-x-6">
                <div class="w-20 h-20 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-3xl">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div>
                    <p class="text-xl font-bold text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <div class="mt-6">
                <button class="px-5 py-2 bg-gray-200 text-gray-800 font-semibold rounded-lg hover:bg-gray-300 transition">
                    Edit Profile
                </button>
            </div>
        </div>

        <!-- Restore Deleted Jobs Section -->
        <div class="bg-white rounded-xl shadow-md">
            <div class="p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Restore Deleted Jobs</h2>
                @if ($trashedJobs->isEmpty())
                    <p class="text-gray-500">You have no deleted jobs.</p>
                @else
                    <div class="space-y-4">
                        @foreach ($trashedJobs as $job)
                            <div class="flex items-center justify-between p-4 border rounded-lg">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $job->title }}</p>
                                    <p class="text-sm text-gray-500">Deleted on: {{ $job->deleted_at->format('F d, Y') }}</p>
                                </div>
                                <form action="{{ route('settings.jobs.restore', $job->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition">
                                        <i class="fas fa-undo-alt mr-2"></i>Restore
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <!-- Pagination for trashed jobs -->
            <div class="bg-gray-50 p-4 border-t">
                {{ $trashedJobs->links() }}
            </div>
        </div>
    </main>
</body>
</html>