<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/catalog', [PackageController::class, 'catalog'])->name('catalog');

Route::get('/reviews', [ReviewController::class, 'index'])->name('review.index');
Route::prefix('reviews')->name('review.')->middleware('auth')->group(function ()
{
    Route::get('/create', [ReviewController::class, 'create'])->name('create');
    Route::post('/', [ReviewController::class, 'store'])->name('store');
    Route::put('/{review}', [ReviewController::class, 'update'])->name('update');
    Route::delete('/{review}', [ReviewController::class, 'destroy'])->name('delete');
});

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function ()
{
    Route::redirect('/', 'order');
    Route::get('/order', [OrderController::class, 'dashboard'])->name('order');
    Route::get('/product', [PackageController::class, 'dashboard'])->name('product');
    Route::post('/product', [PackageController::class, 'store'])->name('product.store');
    Route::put('/product/{product}', [PackageController::class, 'update'])->name('product.update');
    Route::get('/review', [ReviewController::class, 'dashboard'])->name('review');
});

Route::prefix('order')->name('order.')->middleware('auth')->group(function ()
{
    Route::get('/', [OrderController::class, 'create'])->name('create');
    Route::post('/', [OrderController::class, 'store'])->name('store');
    Route::get('/list', [OrderController::class, 'index'])->name('index');
    Route::get('/{order}', [OrderController::class, 'show'])->name('show');
    Route::put('/{order}', [OrderController::class, 'update'])->name('update');
    Route::post('/{order}/updateStatus', [OrderController::class, 'updateStatus'])->name('updateStatus');
    Route::post('/{order}/updatePayment', [OrderController::class, 'updatePayment'])->name('updatePayment');
    Route::delete('/{order}', [OrderController::class, 'destroy'])->name('delete');
});
