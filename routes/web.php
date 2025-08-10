<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\JobListingController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);

// Route::get('/login', [LoginController::class, 'showForm'])->name('login');
// Route::post('/login', [LoginController::class, 'store'])->name('login');;

// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/dashboard', function () {
//     return view('/dashboard');
// })->middleware('auth');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/jobs/create', [JobListingController::class, 'create'])->name('job-listings.create');
//     Route::post('/jobs', [JobListingController::class, 'store'])->name('job-listings.store');
// });

// Route::get('/job-listings', [JobListingController::class, 'index'])->name('job-listings.show');

// Route::get('/job-listings/{job}/edit', [JobListingController::class, 'edit'])->name('job-listings.edit');
// Route::put('/job-listings/{job}', [JobListingController::class, 'update'])->name('job-listings.update');

// // Add this route for handling the delete request
// Route::delete('/job-listings/{job}', [JobListingController::class, 'destroy'])->name('job-listings.destroy');


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JobListingController;


// --- Public Routes ---
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'store']); // Name is inherited from the GET route

// The main page to view all jobs is public
Route::get('/job-listings', [JobListingController::class, 'index'])->name('job-listings.show')->middleware('auth');


// --- Authenticated Routes ---

// Logout requires a user to be logged in
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard is protected
Route::get('/dashboard', function () {
    return view('/dashboard');
})->middleware('auth');

// Create and Store Job routes are protected
Route::get('/jobs/create', [JobListingController::class, 'create'])->name('job-listings.create')->middleware('auth');
Route::post('/jobs', [JobListingController::class, 'store'])->name('job-listings.store')->middleware('auth');

// Edit, Update, and Delete routes are protected
Route::get('/job-listings/{job}/edit', [JobListingController::class, 'edit'])->name('job-listings.edit')->middleware('auth');
Route::put('/job-listings/{job}', [JobListingController::class, 'update'])->name('job-listings.update')->middleware('auth');
Route::delete('/job-listings/{job}', [JobListingController::class, 'destroy'])->name('job-listings.destroy')->middleware('auth');
