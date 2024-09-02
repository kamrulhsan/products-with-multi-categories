<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPurchaseController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function() {
    Route::resource('/product-categories', ProductCategoryController::class);
    
    Route::resource('/products', ProductController::class);
    Route::delete('products/{id}/delete-image', [ProductController::class, 'deleteImage'])->name('products.deleteImage');

    Route::resource('product-purchases', ProductPurchaseController::class);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');