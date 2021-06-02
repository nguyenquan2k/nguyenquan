<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::resource('/admin', AdminProductController::class);