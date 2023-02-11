<?php

use App\Http\Controllers\CheckoutController;
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
    return redirect()->route('checkout.cart');
});

Route::controller(CheckoutController::class)
        ->name('checkout.')
        ->prefix('checkout')
        ->group(
            function () {
                Route::get('/cart', 'cart')->name('cart');
                Route::post('/payment', 'payment')->name('payment');
                Route::post('/proccess', 'proccess')->name('proccess');
                Route::get('/status', 'status')->name('status');
            }
        );
