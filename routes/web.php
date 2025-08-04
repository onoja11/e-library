<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PageController::class, 'homePage'])->name('home.page');
Route::get('about', [PageController::class, 'aboutPage'])->name('about.page');
Route::get('categories', [PageController::class, 'categoriesPage'])->name('categories.page');
Route::get('library', [PageController::class, 'libraryPage'])->name('library.page');
Route::get('contact', [PageController::class, 'contactPage'])->name('contact.page');
Route::post('contact', [PageController::class, 'sendMessage'])->name('contact.send');
Route::get('category/{slug}', [PageController::class, 'viewCategory'])->name('category.view.page');
Route::get('library/{sku}', [PageController::class, 'viewBook'])->name('book.view.page')->middleware('auth');
Route::post('advert', [PageController::class, 'advertCreate'])->name('advert.store');
Route::get('advert', [PageController::class, 'advertPage'])->name('advert.page');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('categories/create', [CategoriesController::class, 'store'])->name('categories.store');

Route::get('all-categories', [CategoriesController::class, 'index'])->name('categories.index');

Route::get('categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::patch('categories/{id}/edit', [CategoriesController::class, 'update'])->name('categories.update');

Route::delete('categories/{id}/delete', [CategoriesController::class, 'destroy'])->name('categories.destroy');


Route::resource('books', BookController::class)->middleware(['auth', 'is.admin'])->except('show');
    

Route::get('download/{sku}', [PageController::class, 'download'])->name('download.book');


// Socialite
Route::get('auth/github', [SocialiteController::class, 'redirectTo'])->name('github.login');
Route::get('auth/github/callback', [SocialiteController::class, 'callback'])->name('github.callback');

Route::get('search', [PageController::class, 'search'])->name('search.page');