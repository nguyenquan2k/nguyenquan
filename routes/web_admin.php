<?php
// use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.post');
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('create', [AdminProductController::class, 'create'])->name('create');

        Route::post('create', [AdminProductController::class, 'store'])->name('store');

        Route::get('/', [AdminProductController::class, 'index'])->name('list');
        Route::delete('/delete', [AdminProductController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [AdminProductController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [AdminProductController::class, 'update'])->name('update');
    });
    Route::prefix('categories')->name('category.')->group(function () {
        Route::get('/', [ CategoryController::class,'index'
            // 'inRoles' => ['admin', 'editor', 'report'],
        ])->name('index');
        Route::delete('/delete', [CategoryController::class,'destroy'
            // 'inRoles' => ['admin', 'editor', 'report'],
        ])->name('delete');
    });
});

