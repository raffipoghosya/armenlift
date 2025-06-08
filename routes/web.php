<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Հիմնական կայքի գլխավոր էջ
Route::get('/', [HomeController::class, 'index']);

// Logout ռոութ (պարտադիր Jetstream / Breeze-ի համար)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Authentication ռոութներ (Jetstream / Breeze ստեղծած)
require __DIR__ . '/auth.php';

// Admin panel — մուտք գործած օգտատերերի համար
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Վահանակ / Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');

    // Մեր մասին
    Route::get('/about', [AboutUsController::class, 'index'])->name('admin.about');
    Route::post('/about', [AboutUsController::class, 'update'])->name('admin.about.update');

    // Ծառայություններ
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    // Աշխատանքներ
    Route::get('/jobs', [JobController::class, 'index'])->name('admin.jobs.index');
    Route::post('/jobs', [JobController::class, 'store'])->name('admin.jobs.store');
    Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('admin.jobs.edit');
    Route::put('/jobs/{id}', [JobController::class, 'update'])->name('admin.jobs.update');
    Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('admin.jobs.destroy');
});
