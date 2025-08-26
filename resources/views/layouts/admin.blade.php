<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-poppins">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="bg-white w-64 min-h-screen shadow-lg fixed">
            <div class="p-4 border-b">
                <h2 class="text-xl font-semibold text-gray-800">Admin Panel</h2>
            </div>
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100' : '' }}">
                            <i class="fas fa-home w-6"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.projects.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg {{ request()->routeIs('admin.projects.*') ? 'bg-gray-100' : '' }}">
                            <i class="fas fa-project-diagram w-6"></i>
                            <span>Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.skills.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg {{ request()->routeIs('admin.skills.*') ? 'bg-gray-100' : '' }}">
                            <i class="fas fa-tools w-6"></i>
                            <span>Skills</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg w-full">
                                <i class="fas fa-sign-out-alt w-6"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 w-full">
            <!-- Top Navigation -->
            <nav class="bg-white shadow-lg p-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl font-semibold">@yield('title')</h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </nav>

            <!-- Content -->
            <div class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')
</body>
</html>
