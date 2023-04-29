<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/books',  [BookController::class, 'index'])->name('books.index');
    Route::get('/books/show/{id}', [BookController::class, 'show'])->name('books.show');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/books/update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::get('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

    Route::get('/editions',  [EditionController::class, 'index'])->name('editions.index');
    Route::get('/editions/show/{id}', [EditionController::class, 'show'])->name('editions.show');
    Route::get('/editions/create', [EditionController::class, 'create'])->name('editions.create');
    Route::post('/editions/store', [EditionController::class, 'store'])->name('editions.store');
    Route::get('/editions/edit/{id}', [EditionController::class, 'edit'])->name('editions.edit');
    Route::post('/editions/update/{id}', [EditionController::class, 'update'])->name('editions.update');
    Route::get('/editions/{id}', [EditionController::class, 'destroy'])->name('editions.destroy');

    Route::get('/categories',  [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/authors',  [AuthorController::class, 'index'])->name('authors.index');
    //Route::get('/authors/show/{id}', [AuthorController::class, 'show'])->name('authors.show');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors/store', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/authors/edit/{id}', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::post('/authors/update/{id}', [AuthorController::class, 'update'])->name('authors.update');
    Route::get('/authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');

    Route::get('/shops',  [ShopController::class, 'index'])->name('shops.index');
    Route::get('/shops/show/{id}', [ShopController::class, 'show'])->name('shops.show');
    Route::get('/shops/create', [ShopController::class, 'create'])->name('shops.create');
    Route::post('/shops/store', [ShopController::class, 'store'])->name('shops.store');
    Route::get('/shops/edit/{id}', [ShopController::class, 'edit'])->name('shops.edit');
    Route::post('/shops/update/{id}', [ShopController::class, 'update'])->name('shops.update');
    Route::get('/shops/{id}', [ShopController::class, 'destroy'])->name('shops.destroy');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
