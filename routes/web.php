<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\CategoryController;

Route::get('/', function () {
    return view('authentication.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Category Routes
    Route::prefix('category')->group(function(){
        Route::get('/list', [CategoryController::class, 'index'])->name('admin#category');
        Route::post('/create',[CategoryController::class,'store'])->name('admin#categoryCreate');

        Route::get('/delete/{id}',[CategoryController::class, 'delete'])->name('admin#categoryDelete');
        Route::get('/view/{id}',[CategoryController::class, 'view'])->name('admin#categoryView');
        Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('admin#categoryEdit');
        Route::post('/update',[CategoryController::class, 'update'])->name('admin#categoryUpdate');
    });
    //Route groups for Books
    Route::prefix('book')->group(function(){
        Route::get('/add',[BookController::class,'add'])->name('admin#bookAdd');
        Route::post('/upload',[BookController::class,'bookUpload'])->name('admin#bookUpload');
        Route::get('/list/{action?}',[BookController::class,'list'])->name('admin#bookList');
        Route::get('/delete/{bookId?}',[BookController::class,'delete'])->name('admin#bookDelete');
    });
});

require __DIR__.'/auth.php';
