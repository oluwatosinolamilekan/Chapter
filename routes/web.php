<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        Route::get('',[UserController::class,'render'])->name('user.index');
        Route::get('/fetch-user', [UserController::class, 'index'])->name('fetch.users');
    });
    Route::get('/products', function () {
        Route::get('',[ProductController::class,'render'])->name('product.index');
        Route::get('/fetch-products', [ProductController::class, 'index'])->name('fetch.products');
        Route::get('/product-in-stock', [ProductController::class, 'getProductInStock'])->name('product.instock');
    });
    Route::get('/customers', function () {
        Route::get('',[CustomerController::class,'render'])->name('customers.index');
        Route::get('/fetch-customers', [CustomerController::class, 'index'])->name('fetch.customer');
    });
    Route::get('/orders', function () {
        Route::get('',[OrderController::class,'render'])->name('customers.index');
        Route::get('/fetch-orders', [OrderController::class, 'index'])->name('order.index');
        Route::get('/show-order', [OrderController::class, 'show'])->name('order.show');
        Route::get('/search-date-orders', [OrderController::class, 'searchDateRange'])->name('search.orders.date');
    });
});
