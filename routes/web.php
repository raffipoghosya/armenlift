<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Հայերեն՝ հիմնական էջը
Route::get('/', [HomeController::class, 'indexHy'])
     ->name('homepage.hy');

// Անգլերեն
Route::get('/en', [HomeController::class, 'indexEn'])
     ->name('homepage.en');

// Ռուսերեն
Route::get('/ru', [HomeController::class, 'indexRu'])
     ->name('homepage.ru');

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
    Route::post('/about', [AboutUsController::class, 'store'])->name('admin.about.store');
    Route::delete('/about/{about}', [AboutUsController::class, 'destroy'])->name('admin.about.destroy');

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




Route::get('/jobs/hy/{id}', [JobController::class, 'showHy'])->name('jobs.hy');
Route::get('/jobs/en/{id}', [JobController::class, 'showEn'])->name('jobs.en');
Route::get('/jobs/ru/{id}', [JobController::class, 'showRu'])->name('jobs.ru');










// Auth համակարգի route-ները (login, register և այլն)
require __DIR__ . '/auth.php';





Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    // Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});

Route::delete('/admin/products/{product}/pdf/{index}', [ProductController::class, 'deletePdf'])->name('admin.products.deletePdf');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');