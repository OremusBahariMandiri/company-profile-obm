<?php

use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\DirectorWelcomeController;
use App\Http\Controllers\Admin\MainContentController;
use App\Http\Controllers\Admin\OrganizationStructureController;
use App\Http\Controllers\Admin\OurActivityController;
use App\Http\Controllers\Admin\OurTeamController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicNewsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TrustedClientController;
use App\Http\Controllers\CaptchaController;
use App\Models\OrganizationStructure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Captcha routes (no middleware)
Route::get('/captcha', [CaptchaController::class, 'show'])->name('captcha.show');
Route::post('/captcha/verify', [CaptchaController::class, 'verify'])->name('captcha.verify');
Route::get('/captcha/reset', [CaptchaController::class, 'reset'])->name('captcha.reset');

// Protected routes with anti-spam middleware
Route::middleware(['anti.spam'])->group(function () {
    Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('landing');
    Route::resource('publicnews', publicNewsController::class);
});

// Auth routes (no anti-spam for login/register)
Auth::routes();

// Admin routes (protected by auth middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('news', NewsController::class);
    Route::resource('main-content', MainContentController::class);
    Route::resource('director-welcome', DirectorWelcomeController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('achievements', AchievementController::class);
    Route::resource('certification', CertificationController::class);
    Route::resource('our-team', OurTeamController::class);
    Route::resource('organization-structure', OrganizationStructureController::class);
    Route::resource('career', CareerController::class);
    Route::resource('activities', OurActivityController::class);
    Route::resource('trusted-clients', TrustedClientController::class);
    Route::resource('branches', BranchController::class);
});