<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\InventoryBookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
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

    Route::get('/authors',  [AuthorController::class, 'index'])->name('authors.index');
    //Route::get('/authors/show/{id}', [AuthorController::class, 'show'])->name('authors.show');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors/store', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/authors/edit/{id}', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::post('/authors/update/{id}', [AuthorController::class, 'update'])->name('authors.update');
    Route::get('/authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');

    Route::get('/genres',  [GenreController::class, 'index'])->name('genres.index');
    Route::get('/genres/show/{id}', [GenreController::class, 'show'])->name('genres.show');
    Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
    Route::post('/genres/store', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/genres/edit/{id}', [GenreController::class, 'edit'])->name('genres.edit');
    Route::post('/genres/update/{id}', [GenreController::class, 'update'])->name('genres.update');
    Route::get('/genres/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');

    Route::get('/employer',  [EmployerController::class, 'index'])->name('employee.index');
    //Route::get('/employer/show/{id}', [EmployerController::class, 'show'])->name('employee.show');
    Route::get('/employer/create', [EmployerController::class, 'create'])->name('employee.create');
    Route::post('/employer/store', [EmployerController::class, 'store'])->name('employee.store');
    Route::get('/employer/edit/{id}', [EmployerController::class, 'edit'])->name('employee.edit');
    Route::post('/employer/update/{id}', [EmployerController::class, 'update'])->name('employee.update');
    Route::get('/employer/{id}', [EmployerController::class, 'destroy'])->name('employee.destroy');

    Route::get('/consumer',  [ConsumerController::class, 'index'])->name('consumers.index');
    //Route::get('/consumer/show/{id}', [ConsumerController::class, 'show'])->name('consumers.show');
    Route::get('/consumer/create', [ConsumerController::class, 'create'])->name('consumers.create');
    Route::post('/consumer/store', [ConsumerController::class, 'store'])->name('consumers.store');
    Route::get('/consumer/edit/{id}', [ConsumerController::class, 'edit'])->name('consumers.edit');
    Route::post('/consumer/update/{id}', [ConsumerController::class, 'update'])->name('consumers.update');
    Route::get('/consumer/{id}', [ConsumerController::class, 'destroy'])->name('consumers.destroy');

    Route::get('/shops',  [ShopController::class, 'index'])->name('shops.index');
    Route::get('/shops/show/{id}', [ShopController::class, 'show'])->name('shops.show');
    Route::get('/shops/create', [ShopController::class, 'create'])->name('shops.create');
    Route::post('/shops/store', [ShopController::class, 'store'])->name('shops.store');
    Route::get('/shops/edit/{id}', [ShopController::class, 'edit'])->name('shops.edit');
    Route::post('/shops/update/{id}', [ShopController::class, 'update'])->name('shops.update');
    Route::get('/shops/{id}', [ShopController::class, 'destroy'])->name('shops.destroy');


    Route::get('/sales',  [SaleController::class, 'index'])->name('sales.index');
    Route::get('/sales/show/{id}', [SaleController::class, 'show'])->name('sales.show');
    Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/sales/store', [SaleController::class, 'store'])->name('sales.store');
    Route::get('/sales/edit/{id}', [SaleController::class, 'edit'])->name('sales.edit');
    Route::post('/sales/update/{id}', [SaleController::class, 'update'])->name('sales.update');
    Route::get('/sales/{id}', [SaleController::class, 'destroy'])->name('sales.destroy');

    Route::get('/inventory_book',  [InventoryBookController::class, 'index'])->name('inventory_books.index');
    //Route::get('/shops/show/{id}', [ShopController::class, 'show'])->name('shops.show');
    Route::get('/inventory_book/create', [InventoryBookController::class, 'create'])->name('inventory_books.create');
    Route::post('/inventory_book/store', [InventoryBookController::class, 'store'])->name('inventory_books.store');
    Route::get('/inventory_book/edit/{id}', [InventoryBookController::class, 'edit'])->name('inventory_books.edit');
    Route::post('/inventory_book/update/{id}', [InventoryBookController::class, 'update'])->name('inventory_books.update');
    Route::get('/inventory_book/{id}', [InventoryBookController::class, 'destroy'])->name('inventory_books.destroy');


});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
