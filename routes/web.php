<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsItemController;
use App\Http\Controllers\Userzone\ProfileController;
use App\Http\Controllers\ContactController;

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

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/nieuws/create', [NewsItemController::class, 'create'])->name('nieuws.create');
    Route::post('/nieuws', [NewsItemController::class, 'store'])->name('nieuws.store');
    Route::get('/nieuws/{newsItem}/edit', [NewsItemController::class, 'edit'])->name('nieuws.edit');
    Route::patch('/nieuws/{newsItem}', [NewsItemController::class, 'update'])->name('nieuws.update');
    Route::delete('/nieuws/{newsItem}', [NewsItemController::class, 'destroy'])->name('nieuws.destroy');
});

Route::get('/nieuws/{newsItem}', [NewsItemController::class, 'show'])->name('nieuws.show');

Route::get('/faq', [App\Http\Controllers\FaqCategoryController::class, 'index'])->name('faq.index');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/faq/create', [App\Http\Controllers\FaqCategoryController::class, 'create'])->name('faq.create');
    Route::post('/faq', [App\Http\Controllers\FaqCategoryController::class, 'store'])->name('faq.store');
    Route::get('/faq/{faqCategory}/edit', [App\Http\Controllers\FaqCategoryController::class, 'edit'])->name('faq.edit');
    Route::patch('/faq/{faqCategory}', [App\Http\Controllers\FaqCategoryController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{faqCategory}', [App\Http\Controllers\FaqCategoryController::class, 'destroy'])->name('faq.destroy');

    Route::post('/faq/{faqCategory}/items', [App\Http\Controllers\FaqItemController::class, 'store'])->name('faq.items.store');
    Route::delete('/faq/items/{faqItem}', [App\Http\Controllers\FaqItemController::class, 'destroy'])->name('faq.items.destroy');
});

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
    Route::patch('/admin/users/{user}/toggle-admin', [App\Http\Controllers\Admin\UserController::class, 'toggleAdmin'])->name('admin.users.toggleAdmin');
    Route::delete('/admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
});

require __DIR__.'/auth.php';