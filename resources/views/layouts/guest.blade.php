<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - My Portfolio</title>
    
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
                    colors: {
                        primary: '#2563eb',
                        secondary: '#475569',
                        dark: '#0f172a',
                    },
                }
            }
        }
    </script>
    
    <style type="text/css">
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-dark">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-gray-800 shadow-lg">
            <div class="container mx-auto px-6 py-4">
                <div class="flex justify-between items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-primary">
                        Portfolio.
                    </a>
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-primary dark:text-gray-300">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 py-4">
            <div class="container mx-auto px-6">
                <p class="text-center text-gray-600 dark:text-gray-400">
                    &copy; {{ date('Y') }} Portfolio. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
