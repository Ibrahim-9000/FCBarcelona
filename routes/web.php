<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsItemController;
use App\Http\Controllers\Userzone\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/nieuws', [NewsItemController::class, 'index'])->name('nieuws.index');

Route::middleware('auth')->group(function () {
    Route::get('/nieuws/create', [NewsItemController::class, 'create'])->name('nieuws.create');
    Route::post('/nieuws', [NewsItemController::class, 'store'])->name('nieuws.store');
    Route::get('/nieuws/{newsItem}/edit', [NewsItemController::class, 'edit'])->name('nieuws.edit');
    Route::patch('/nieuws/{newsItem}', [NewsItemController::class, 'update'])->name('nieuws.update');
    Route::delete('/nieuws/{newsItem}', [NewsItemController::class, 'destroy'])->name('nieuws.destroy');
});

Route::get('/nieuws/{newsItem}', [NewsItemController::class, 'show'])->name('nieuws.show');

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

require __DIR__.'/auth.php';