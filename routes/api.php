<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [LoginController::class,'authenticate'])->name('login');

Route::middleware('auth:api')->prefix('products')->name('products.')->group(function(){
    Route::get('/',[ProductController::class,'index'])->name('index');

    Route::get('/{id}/show', [ProductController::class,'show'])
    ->name('show');
    Route::post('store', [ProductController::class,'store'])
    ->name('store');

});
Route::prefix('categories')->name('categories.')->group(function(){
    Route::get('/',[CategoryController::class,'index'])->name('index');

    // Route::get('/{id}/show', ['uses' => 'Api\CategoryController@show'])
    // ->name('show');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
