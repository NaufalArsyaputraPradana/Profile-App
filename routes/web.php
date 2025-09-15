<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\ContactSectionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/projects/{project}', [PageController::class, 'projectDetail'])->name('projects.show');
Route::get('/skills', [PageController::class, 'skills'])->name('skills');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Authentication Routes
Route::middleware('auth')->group(function () {
    // Profile routes will be added later when ProfileController is created
});

require __DIR__.'/auth.php';

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Resource Routes
    Route::resources([
        'projects' => ProjectController::class,
        'skills' => SkillController::class,
        'hero' => HeroSectionController::class,
        'about' => AboutSectionController::class,
        'contact' => ContactSectionController::class,
    ]);
});