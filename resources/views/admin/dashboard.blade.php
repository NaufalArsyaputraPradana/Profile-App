@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-6">
    <!-- Welcome Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang di Admin Dashboard</h1>
        <p class="text-gray-600">Kelola portfolio Anda dengan mudah melalui panel admin ini</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Projects Card -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-sm font-medium text-blue-100">Total Projects</h3>
                    <p class="text-3xl font-bold">{{ \App\Models\Project::count() }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-project-diagram text-2xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="text-blue-100 hover:text-white text-sm font-semibold flex items-center">
                Lihat Semua Projects
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <!-- Skills Card -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-sm font-medium text-green-100">Total Skills</h3>
                    <p class="text-3xl font-bold">{{ \App\Models\Skill::count() }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-tools text-2xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.skills.index') }}" class="text-green-100 hover:text-white text-sm font-semibold flex items-center">
                Lihat Semua Skills
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <!-- About Sections Card -->
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-sm font-medium text-purple-100">About Sections</h3>
                    <p class="text-3xl font-bold">{{ \App\Models\AboutSection::count() }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-user text-2xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.about.index') }}" class="text-purple-100 hover:text-white text-sm font-semibold flex items-center">
                Kelola About
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <!-- Hero Sections Card -->
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-sm font-medium text-orange-100">Hero Sections</h3>
                    <p class="text-3xl font-bold">{{ \App\Models\HeroSection::count() }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-star text-2xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.hero.index') }}" class="text-orange-100 hover:text-white text-sm font-semibold flex items-center">
                Kelola Hero
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>

    <!-- Additional Stats Row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Contact Sections Card -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Contact Sections</h3>
                    <p class="text-3xl font-bold text-red-600">{{ \App\Models\ContactSection::count() }}</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fas fa-envelope text-red-600 text-xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.contact.index') }}" class="text-red-600 hover:text-red-800 text-sm font-semibold flex items-center">
                Kelola Contact
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <!-- Active Status -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-indigo-500">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Status Aktif</h3>
                    <div class="space-y-1">
                        <p class="text-sm text-gray-600">
                            Hero: 
                            <span class="font-semibold {{ \App\Models\HeroSection::where('is_active', true)->exists() ? 'text-green-600' : 'text-red-600' }}">
                                {{ \App\Models\HeroSection::where('is_active', true)->exists() ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </p>
                        <p class="text-sm text-gray-600">
                            About: 
                            <span class="font-semibold {{ \App\Models\AboutSection::where('is_active', true)->exists() ? 'text-green-600' : 'text-red-600' }}">
                                {{ \App\Models\AboutSection::where('is_active', true)->exists() ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </p>
                    </div>
                </div>
                <div class="bg-indigo-100 p-3 rounded-full">
                    <i class="fas fa-check-circle text-indigo-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Quick View Portfolio -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-teal-500">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Portfolio</h3>
                    <p class="text-sm text-gray-600">Lihat hasil portfolio Anda</p>
                </div>
                <div class="bg-teal-100 p-3 rounded-full">
                    <i class="fas fa-external-link-alt text-teal-600 text-xl"></i>
                </div>
            </div>
            <a href="/" target="_blank" class="text-teal-600 hover:text-teal-800 text-sm font-semibold flex items-center">
                Buka Portfolio
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>

    </div>

    <!-- Quick Actions Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-6 flex items-center">
                <i class="fas fa-bolt text-yellow-500 mr-2"></i>
                Quick Actions
            </h3>
            <div class="space-y-3">
                <a href="{{ route('admin.projects.create') }}" class="flex items-center px-4 py-3 bg-gradient-to-r from-blue-50 to-blue-100 text-blue-700 rounded-lg hover:from-blue-100 hover:to-blue-200 transition-all duration-200">
                    <i class="fas fa-plus mr-3 w-4"></i>
                    <span class="font-medium">Tambah Project Baru</span>
                </a>
                <a href="{{ route('admin.skills.create') }}" class="flex items-center px-4 py-3 bg-gradient-to-r from-green-50 to-green-100 text-green-700 rounded-lg hover:from-green-100 hover:to-green-200 transition-all duration-200">
                    <i class="fas fa-plus mr-3 w-4"></i>
                    <span class="font-medium">Tambah Skill Baru</span>
                </a>
                <a href="{{ route('admin.hero.create') }}" class="flex items-center px-4 py-3 bg-gradient-to-r from-orange-50 to-orange-100 text-orange-700 rounded-lg hover:from-orange-100 hover:to-orange-200 transition-all duration-200">
                    <i class="fas fa-plus mr-3 w-4"></i>
                    <span class="font-medium">Tambah Hero Section</span>
                </a>
                <a href="{{ route('admin.about.create') }}" class="flex items-center px-4 py-3 bg-gradient-to-r from-purple-50 to-purple-100 text-purple-700 rounded-lg hover:from-purple-100 hover:to-purple-200 transition-all duration-200">
                    <i class="fas fa-plus mr-3 w-4"></i>
                    <span class="font-medium">Tambah About Section</span>
                </a>
                <a href="{{ route('admin.contact.create') }}" class="flex items-center px-4 py-3 bg-gradient-to-r from-red-50 to-red-100 text-red-700 rounded-lg hover:from-red-100 hover:to-red-200 transition-all duration-200">
                    <i class="fas fa-plus mr-3 w-4"></i>
                    <span class="font-medium">Tambah Contact Section</span>
                </a>
            </div>
        </div>

        <!-- Recent Projects -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-6 flex items-center">
                <i class="fas fa-clock text-blue-500 mr-2"></i>
                Project Terbaru
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase rounded-tl-lg">Title</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Technologies</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Created</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase rounded-tr-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse(\App\Models\Project::latest()->take(5)->get() as $project)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $project->title }}</div>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @foreach(array_slice($project->technologies ?? [], 0, 2) as $tech)
                                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">{{ $tech }}</span>
                                    @endforeach
                                    @if(count($project->technologies ?? []) > 2)
                                        <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">+{{ count($project->technologies) - 2 }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $project->created_at->format('d M Y') }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:text-blue-900 text-sm font-medium">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-4 py-8 text-center text-gray-500">
                                <i class="fas fa-inbox text-4xl mb-2 opacity-30"></i>
                                <p>Belum ada project yang dibuat</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Skills Overview -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-6 flex items-center">
            <i class="fas fa-chart-bar text-green-500 mr-2"></i>
            Overview Skills by Category
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Frontend Skills -->
            <div class="text-center">
                <div class="bg-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-palette text-blue-600 text-2xl"></i>
                </div>
                <h4 class="font-semibold text-gray-700">Frontend</h4>
                <p class="text-2xl font-bold text-blue-600">{{ \App\Models\Skill::where('category', 'frontend')->count() }}</p>
                <p class="text-sm text-gray-500">Skills</p>
            </div>
            
            <!-- Backend Skills -->
            <div class="text-center">
                <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-server text-green-600 text-2xl"></i>
                </div>
                <h4 class="font-semibold text-gray-700">Backend</h4>
                <p class="text-2xl font-bold text-green-600">{{ \App\Models\Skill::where('category', 'backend')->count() }}</p>
                <p class="text-sm text-gray-500">Skills</p>
            </div>
            
            <!-- Design Skills -->
            <div class="text-center">
                <div class="bg-purple-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-paint-brush text-purple-600 text-2xl"></i>
                </div>
                <h4 class="font-semibold text-gray-700">Design</h4>
                <p class="text-2xl font-bold text-purple-600">{{ \App\Models\Skill::where('category', 'design')->count() }}</p>
                <p class="text-sm text-gray-500">Skills</p>
            </div>
        </div>
    </div>
</div>
@endsection
