<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Frontend\NewsController as FrontendNewsController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ContactController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/berita', [FrontendNewsController::class, 'index'])
    ->name('frontend.news.index');

Route::get('/berita/{slug}', [FrontendNewsController::class, 'show'])
    ->name('frontend.news.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])
        ->name('admin.profile.edit');
    Route::put('/admin/profile', [AdminProfileController::class, 'update'])
        ->name('admin.profile.update');
    Route::resource('/admin/gallery', GalleryController::class)
        ->except(['show']);
    Route::resource('/admin/schedule', ScheduleController::class)
        ->except('show');
    Route::resource('/admin/news', NewsController::class)
        ->except('show');
    Route::resource('/admin/video', VideoController::class)
        ->except('show');
    Route::get('/admin/contact', [ContactController::class, 'edit'])
        ->name('contact.edit');
    Route::put('/admin/contact', [ContactController::class, 'update'])
        ->name('contact.update');
});

require __DIR__ . '/auth.php';