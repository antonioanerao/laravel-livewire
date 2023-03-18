<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('product', ProductController::class);

Route::get('dropdown', [ProjectController::class, 'dropdowns'])->name('dropdowns');
Route::post('dropdown', [ProjectController::class, 'postDropdowns'])->name('dropdowns.submit');

Route::get('bitcoin-price', [HomeController::class, 'bitcoinPrice'])->name('bitcoin.price');
