<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/reviews', [ReviewController::class, 'index'])->name('review.index');
Route::prefix('reviews')->name('review.')->middleware('auth')->group(function ()
{
    Route::get('/create', [ReviewController::class, 'create'])->name('create');
    Route::post('/', [ReviewController::class, 'store'])->name('store');
    Route::put('/{review}', [ReviewController::class, 'update'])->name('update');
    Route::delete('/{review}', [ReviewController::class, 'destroy'])->name('delete');
});

Route::prefix('order')->name('order.')->middleware('auth')->group(function ()
{
    Route::get('/', [OrderController::class, 'create'])->name('create');
    Route::post('/', [OrderController::class, 'store'])->name('store');
    Route::get('/list', [OrderController::class, 'index'])->name('index');
    Route::put('/{order}', [OrderController::class, 'update'])->name('update');
    Route::delete('/{order}', [OrderController::class, 'destroy'])->name('delete');
});
