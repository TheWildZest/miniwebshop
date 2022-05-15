<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [ProductController::class, 'getAll'])->name('home');
Route::get('/kereses', [ProductController::class, 'getByKeyword'])->name('searchProducts');

Route::post('/kosarba', [ProductController::class, 'addToCart'])->name('addToCart');
Route::get('/kosar', [ProductController::class, 'getProductsFromSession'])->name('cart');

Route::get('/rendeles', [OrderController::class, 'placeOrderForm'])->name('placeOrderForm')->middleware('auth');
Route::post('/rendeles', [OrderController::class], 'placeOrder')->name('placeOrder')->middleware('auth');

Route::get('/belepes', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/belepes', [AuthController::class, 'login'])->name('login');
Route::get('/kilepes', [AuthController::class, 'logout'])->name('logout');
