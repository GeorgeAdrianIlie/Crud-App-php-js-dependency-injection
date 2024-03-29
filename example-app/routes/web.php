<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/categories', CategoryController::class);
Route::get('/cancel-edit-category/{id}', [CategoryController::class, 'cancelEdit']);

Route::resource('/products', ProductController::class);
Route::get('/cancel-edit-product/{id}', [ProductController::class, 'cancelEdit']);