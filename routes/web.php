<?php

use App\Http\Controllers\Settings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\HallController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');

    Route::get('genres/create', [GenreController::class, 'create'])->name('genres.create');
    Route::post('genres', [GenreController::class, 'store'])->name('genres.store');
    Route::get('genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
    Route::delete('genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');

    Route::get('movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('movies', [MovieController::class, 'store'])->name('movies.store');
    Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

    Route::get('performances/create', [PerformanceController::class, 'create'])->name('performances.create');
    Route::post('performances', [PerformanceController::class, 'store'])->name('performances.store');
    Route::get('performances/{performance}/edit', [PerformanceController::class, 'edit'])->name('performances.edit');
    Route::put('performances/{performance}', [PerformanceController::class, 'update'])->name('performances.update');
    Route::delete('performances/{performance}', [PerformanceController::class, 'destroy'])->name('performances.destroy');

    Route::get('halls/create', [HallController::class, 'create'])->name('halls.create');
    Route::post('halls', [HallController::class, 'store'])->name('halls.store');
    Route::get('halls/{hall}/edit', [HallController::class, 'edit'])->name('halls.edit');
    Route::put('halls/{hall}', [HallController::class, 'update'])->name('halls.update');
    Route::delete('halls/{hall}', [HallController::class, 'destroy'])->name('halls.destroy');
    });
    
    Route::get('genres', [GenreController::class, 'index'])->name('genres.index');
    Route::get('genres/{genre}', [GenreController::class, 'show'])->name('genres.show');
    
    Route::get('movies', [MovieController::class, 'index'])->name('movies.index');
    Route::get('movies/{movie}', [MovieController::class, 'show'])->name('movies.show');


    Route::get('performances', [PerformanceController::class, 'index'])->name('performances.index');
    Route::get('performances/{performance}', [PerformanceController::class, 'show'])->name('performances.show');


    Route::get('halls', [HallController::class, 'index'])->name('halls.index');
    Route::get('halls/{hall}', [HallController::class, 'show'])->name('halls.show');

require __DIR__.'/auth.php';
