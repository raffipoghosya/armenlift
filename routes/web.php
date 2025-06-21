<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Հիմնական public էջ
Route::get('/', [HomeController::class, 'index'])->name('homepage');


// Logout՝ մուտք գործած օգտատերերի համար
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Մուտք գործած օգտատերերի admin բաժին
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');

    // About Us
    Route::get('/about', [AboutUsController::class, 'index'])->name('admin.about');
    Route::post('/about', [AboutUsController::class, 'update'])->name('admin.about.update');

    // Services
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    // Jobs
    Route::get('/jobs', [JobController::class, 'index'])->name('admin.jobs.index');
    Route::post('/jobs', [JobController::class, 'store'])->name('admin.jobs.store');
    Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('admin.jobs.edit');
    Route::put('/jobs/{id}', [JobController::class, 'update'])->name('admin.jobs.update');
    Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('admin.jobs.destroy');
});

// Auth համակարգի route-ները (login, register և այլն)
require __DIR__.'/auth.php';


Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    // Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});

Route::delete('/admin/products/{product}/pdf/{index}', [ProductController::class, 'deletePdf'])->name('admin.products.deletePdf');
