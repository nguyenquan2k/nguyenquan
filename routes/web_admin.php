<?php
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::prefix('admin')->name('admin.')->group(function () {
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