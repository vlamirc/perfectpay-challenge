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
    return redirect()->route('checkout.form');
});

Route::controller(CheckoutController::class)
        ->name('checkout.')
        ->prefix('checkout')
        ->group(
            function () {
                Route::get('/form', 'form')->name('form');
                Route::get('/congratulation', 'congratulation')->name('congratulation');
            }
        );
