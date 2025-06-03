<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

// Jetstream/Breeze-ի արդեն առկա route
Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// About Us
Route::get('/admin/about', [AboutUsController::class, 'index'])->name('admin.about');
Route::post('/admin/about', [AboutUsController::class, 'update'])->name('admin.about.update');
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->name('admin.dashboard');




// services
Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index');
Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
Route::get('/admin/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
Route::put('/admin/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
Route::delete('/admin/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');


// jobs
Route::get('/admin/jobs', [JobController::class, 'index'])->name('admin.jobs.index');
Route::post('/admin/jobs', [JobController::class, 'store'])->name('admin.jobs.store');
Route::get('/admin/jobs/{id}/edit', [JobController::class, 'edit'])->name('admin.jobs.edit');
Route::put('/admin/jobs/{id}', [JobController::class, 'update'])->name('admin.jobs.update');
Route::delete('/admin/jobs/{id}', [JobController::class, 'destroy'])->name('admin.jobs.destroy');
