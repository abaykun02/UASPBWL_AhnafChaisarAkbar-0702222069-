<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');});
Route::get('/dashboard', function () {
    return view('dashboard');
});


use App\Http\Controllers\JobController;

Route::resource('jobs', JobController::class);

use App\Http\Controllers\ApplicantController;

// Route untuk Applicants
Route::resource('applicants', ApplicantController::class);

use App\Http\Controllers\JobApplicationController;

Route::resource('job_applications', JobApplicationController::class);

