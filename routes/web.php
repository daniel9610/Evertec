<?php

use Illuminate\Support\Facades\Route;
use App\Models\Picture;
use App\Models\Item;


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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
