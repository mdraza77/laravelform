<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JobListingController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');;

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('/dashboard');
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/jobs/create', [JobListingController::class, 'create'])->name('job-listings.create');
    Route::post('/jobs', [JobListingController::class, 'store'])->name('job-listings.store');
});