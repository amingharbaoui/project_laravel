<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\FaqItemController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users/{user}', [PublicProfileController::class, 'show'])->name('profile.show');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});

Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/faq', [FaqCategoryController::class, 'index'])->name('faq.index');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/faq-categories', [FaqCategoryController::class, 'store'])->name('faq-categories.store');
    Route::put('/faq-categories/{faqCategory}', [FaqCategoryController::class, 'update'])->name('faq-categories.update');
    Route::delete('/faq-categories/{faqCategory}', [FaqCategoryController::class, 'destroy'])->name('faq-categories.destroy');

    Route::post('/faq-items', [FaqItemController::class, 'store'])->name('faq-items.store');
    Route::put('/faq-items/{faqItem}', [FaqItemController::class, 'update'])->name('faq-items.update');
    Route::delete('/faq-items/{faqItem}', [FaqItemController::class, 'destroy'])->name('faq-items.destroy');
});

require __DIR__.'/auth.php';
