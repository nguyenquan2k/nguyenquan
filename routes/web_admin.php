<?php
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.post');
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
      Route::prefix('products')->name('products.')->group(function(){
          Route::get('create', [AdminProductController::class, 'create'])->name('create');
  
          Route::post('create', [AdminProductController::class, 'store'])->name('store');
  
          Route::get('/', [AdminProductController::class, 'index'])->name('list');
          Route::post('delete/{id}', [AdminProductController::class, 'delete'])->name('delete');
          Route::get('edit/{id}', [AdminProductController::class, 'edit'])->name('edit');
          Route::post('update/{id}', [AdminProductController::class, 'update'])->name('update');
      });
  });
// Route::get('admin/products/create', [AdminProductController::class, 'index'])->name('admin.products.create');
// Route::post('admin/products/create', [AdminProductController::class, 'store'])->name('admin.products.store');
// Route::resource('/admin', AdminProductController::class);