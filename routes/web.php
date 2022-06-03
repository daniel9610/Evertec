<?php

use Illuminate\Support\Facades\Route;
use App\Models\Picture;
use App\Models\Item;
use App\Http\Controllers\OrderController;

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
    $slider = Picture::where('type', 2)->get();
    $items = Item::with('picture')->get();
    return view('welcome', compact('slider', 'items'));
})->name('welcome');
Route::post('/store-order', [OrderController::class, 'store'])->name('store-order');

Route::get('/create-order/{item_id}', [OrderController::class, 'create'])->name('create-order');
Route::post('/redirect-to-pay', [OrderController::class, 'redirectToPay'])->name('redirect-to-pay');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
