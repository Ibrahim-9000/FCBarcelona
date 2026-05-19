<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile/{user}', [App\Http\Controllers\Userzone\ProfileController::class, 'show'])->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/nieuws', [NewsItemController::class, 'index'])->name('nieuws.index');

Route::middleware('auth')->group(function () {
    Route::get('/nieuws/create', [NewsItemController::class, 'create'])->name('nieuws.create');
    Route::post('/nieuws', [NewsItemController::class, 'store'])->name('nieuws.store');
});

Route::get('/nieuws/{newsItem}', [NewsItemController::class, 'show'])->name('nieuws.show');

require __DIR__.'/auth.php';