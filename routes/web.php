<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;



Route::get('/about', function() { // my amazing new route
    return "Halaman About, Cool!!!";
});


Route::get('/students', [StudentController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return view('starter'); // previous page: welcome
    })->name('home');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/book', [BookController::class, 'index'])->name('book.index');

    Route::middleware('def:1')->group(function() {
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/{category}/edit', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.delete');

        Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
        Route::post('/book/create', [BookController::class, 'store'])->name('book.store');
        Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
        Route::put('/book/{book}/edit', [BookController::class, 'update'])->name('book.update');
        Route::delete('/bookk/{book}/destroy', [BookController::class, 'destroy'])->name('book.delete');

    });
});



require __DIR__.'/auth.php';
