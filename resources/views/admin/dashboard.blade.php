@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Projects Card -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Total Projects</h3>
                <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Project::count() }}</p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <i class="fas fa-project-diagram text-blue-600 text-xl"></i>
            </div>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
            Lihat Semua Projects →
        </a>
    </div>

    <!-- Skills Card -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Total Skills</h3>
                <p class="text-3xl font-bold text-green-600">{{ \App\Models\Skill::count() }}</p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <i class="fas fa-tools text-green-600 text-xl"></i>
            </div>
        </div>
        <a href="{{ route('admin.skills.index') }}" class="text-green-600 hover:text-green-800 text-sm font-semibold">
            Lihat Semua Skills →
        </a>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Quick Actions</h3>
        <div class="space-y-3">
            <a href="{{ route('admin.projects.create') }}" class="block px-4 py-2 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100">
                <i class="fas fa-plus mr-2"></i> Tambah Project Baru
            </a>
            <a href="{{ route('admin.skills.create') }}" class="block px-4 py-2 bg-green-50 text-green-700 rounded-lg hover:bg-green-100">
                <i class="fas fa-plus mr-2"></i> Tambah Skill Baru
            </a>
            <a href="/" target="_blank" class="block px-4 py-2 bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100">
                <i class="fas fa-eye mr-2"></i> Lihat Portfolio
            </a>
        </div>
    </div>

    <!-- Recent Projects -->
    <div class="md:col-span-2 lg:col-span-3 bg-white rounded-lg shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Project Terbaru</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Technologies</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Created At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach(\App\Models\Project::latest()->take(5)->get() as $project)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $project->title }}</td>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-2">
                                @foreach($project->technologies as $tech)
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $project->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:text-blue-900">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
