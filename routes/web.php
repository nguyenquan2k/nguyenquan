<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('category/{id}', [ProductController::class, 'index'])->name('product.index');
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
// Route::resource('/admin', AdminProductController::class);
// Route::get('admin/{store}', [AdminProductController::class, 'store'])->name('admin.products.create');

// Route::get('admin/create', [AdminProductController::class, 'create'])->name('admin.products.create');