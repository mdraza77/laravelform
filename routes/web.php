<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\SettingsController;

// --- Public & Guest Routes ---
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'store']);


// --- Authenticated Routes ---

// **IMPORTANT**: Static routes like 'create' must come before dynamic routes like '{job}'.
Route::get('/jobs/create', [JobListingController::class, 'create'])->name('job-listings.create')->middleware('auth');
Route::post('/jobs', [JobListingController::class, 'store'])->name('job-listings.store')->middleware('auth');

// This is the public route to show a single job's details
Route::get('/jobs/{job}', [JobListingController::class, 'show'])->name('jobs.show');

// Page to view the user's own jobs
Route::get('/job-listings', [JobListingController::class, 'index'])->name('job-listings.show')->middleware('auth');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// **NEW:** Settings Page Routes
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('/settings/jobs/{id}/restore', [SettingsController::class, 'restore'])->name('settings.jobs.restore');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Edit, Update, and Delete routes
Route::get('/job-listings/{job}/edit', [JobListingController::class, 'edit'])->name('job-listings.edit')->middleware('auth');
Route::put('/job-listings/{job}', [JobListingController::class, 'update'])->name('job-listings.update')->middleware('auth');
Route::delete('/job-listings/{job}', [JobListingController::class, 'destroy'])->name('job-listings.destroy')->middleware('auth');
