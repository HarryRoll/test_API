<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerCtrl;
use App\Http\Controllers\CustomerAddCtrl;
use App\Http\Controllers\ProductCtrl;
use App\Http\Controllers\PaymentCtrl;
use App\Http\Controllers\OrdersCtrl;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//get method
Route::get('/customer',[CustomerCtrl::class, 'index'])->name('customer_get');
Route::get('/customerAdd',[CustomerAddCtrl::class, 'index'])->name('customerAdd_get');
Route::get('/product',[ProductCtrl::class, 'index'])->name('product_get');
Route::get('/payment',[PaymentCtrl::class, 'index'])->name('payment_get');
Route::get('/orders',[OrdersCtrl::class, 'index'])->name('orders_get');

//post method
Route::post('/customer',[CustomerCtrl::class, 'create'])->name('customer_create');
Route::post('/customerAdd',[CustomerAddCtrl::class, 'create'])->name('customerAdd_create');
Route::post('/product',[ProductCtrl::class, 'create'])->name('product_create');
Route::post('/payment',[PaymentCtrl::class, 'create'])->name('payment_create');
Route::post('/orders',[OrdersCtrl::class, 'create'])->name('orders_create');

//put method
Route::put('/customer/{id}',[CustomerCtrl::class, 'update'])->name('customer_update');
Route::put('/customerAdd/{id}',[CustomerAddCtrl::class, 'update'])->name('customerAdd_update');
Route::put('/product/{id}',[ProductCtrl::class, 'update'])->name('product_update');
Route::put('/payment/{id}',[PaymentCtrl::class, 'update'])->name('payment_update');
Route::put('/orders/{id}',[OrdersCtrl::class, 'update'])->name('orders_update');

//delete method
Route::delete('/customer/{id}',[CustomerCtrl::class, 'destroy'])->name('customer_delete');
Route::delete('/customerAdd/{id}',[CustomerAddCtrl::class, 'destroy'])->name('customerAdd_delete');
Route::delete('/product/{id}',[ProductCtrl::class, 'destroy'])->name('product_delete');
Route::delete('/payment/{id}',[PaymentCtrl::class, 'destroy'])->name('payment_delete');
Route::delete('/orders/{id}',[OrdersCtrl::class, 'destroy'])->name('orders_delete');
