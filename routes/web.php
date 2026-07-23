<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\ContactSectionController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\CertificateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// Maintenance Routes
// ==========================================
Route::get('/db-command', function (\Illuminate\Http\Request $request) {
    $token = $request->query('token');

    // Hanya jalan jika aksesnya: domain.com/db-command?token=arsya123
    if ($token !== 'arsya123') {
        abort(403, 'Akses ditolak.');
    }

    Artisan::call('migrate:fresh', ['--force' => true, '--seed' => true]);
    return "Migrasi dan Seeding Selesai!";
});

Route::get('/clean-all', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return "Semua cache berhasil dibersihkan!";
});

// ==========================================
// PUBLIC ROUTES
// ==========================================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Portfolio / Projects
Route::get('/portfolio', [PageController::class, 'projects'])->name('projects');
Route::get('/portfolio/{project}', [PageController::class, 'projectDetail'])->name('projects.show');
// Skills
Route::get('/skills', [PageController::class, 'skills'])->name('skills');

// Experience
Route::get('/experience', [PageController::class, 'experience'])->name('experience');

// Education
Route::get('/education', [PageController::class, 'education'])->name('education');

// Certifications
Route::get('/certifications', [PageController::class, 'certifications'])->name('certifications');

// Trainings
Route::get('/trainings', [PageController::class, 'trainings'])->name('trainings');

// Certificates Gallery
Route::get('/certificates', [PageController::class, 'certificates'])->name('certificates');

// Contact
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

// ==========================================
// AUTHENTICATION ROUTES
// ==========================================
Route::middleware('auth')->group(function () {
    // Profile routes
});

require __DIR__.'/auth.php';

// ==========================================
// ADMIN ROUTES
// ==========================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        $stats = [
            'projects' => \App\Models\Project::count(),
            'certificates' => \App\Models\Certificate::count(),
            'experiences' => \App\Models\Experience::count(),
            'educations' => \App\Models\Education::count(),
            'certifications' => \App\Models\Certification::count(),
            'trainings' => \App\Models\Training::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    })->name('dashboard');

    // Settings (Singletons)
    Route::get('/hero', [HeroSectionController::class, 'index'])->name('hero.index');
    Route::put('/hero', [HeroSectionController::class, 'update'])->name('hero.update');
    
    Route::get('/about', [AboutSectionController::class, 'index'])->name('about.index');
    Route::put('/about', [AboutSectionController::class, 'update'])->name('about.update');
    
    Route::get('/contact', [ContactSectionController::class, 'index'])->name('contact.index');
    Route::put('/contact', [ContactSectionController::class, 'update'])->name('contact.update');

    // CRUD Resources
    Route::resources([
        'projects' => ProjectController::class,
        'skills' => SkillController::class,
        'experiences' => ExperienceController::class,
        'educations' => EducationController::class,
        'organizations' => OrganizationController::class,
        'certifications' => CertificationController::class,
        'trainings' => TrainingController::class,
        'certificates' => CertificateController::class,
    ]);
});