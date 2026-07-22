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
// ARTISAN COMMANDS (development only)
// ==========================================
Route::get('/artisan/migrate-fresh-seed', function () {
    try {
        Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
        $output = Artisan::output();
        Artisan::call('storage:link', ['--force' => true]);
        return response('<pre style="background:#1e293b;color:#a3e635;padding:2rem;font-size:14px;min-height:100vh;">
<strong style="font-size:18px;">✅ migrate:fresh --seed berhasil dijalankan!</strong>

' . htmlspecialchars($output) . '

<strong>Storage Link:</strong> ✅ Done

<a href="/" style="color:#60a5fa;">⬅ Kembali ke Homepage</a>
</pre>');
    } catch (\Exception $e) {
        return response('<pre style="background:#1e293b;color:#f87171;padding:2rem;">
<strong>❌ Error:</strong> ' . $e->getMessage() . '
</pre>', 500);
    }
});

Route::get('/artisan/storage-link', function () {
    Artisan::call('storage:link', ['--force' => true]);
    return 'Storage link created! <a href="/">Back to home</a>';
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
    return 'Done!';
});

// ==========================================
// PUBLIC ROUTES
// ==========================================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Portfolio / Projects
Route::get('/portfolio', [PageController::class, 'projects'])->name('projects');
Route::get('/portfolio/{project}', [PageController::class, 'projectDetail'])->name('projects.show');
Route::get('/other-projects', [PageController::class, 'otherProjects'])->name('other-projects');

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