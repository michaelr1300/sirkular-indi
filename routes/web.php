<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StaticPageController;
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
Auth::routes();

Route::get('/about', function () {
    return view('about');
});

Route::get('/', [StaticPageController::class, 'home'])->name('landing');
Route::get('/home', [StaticPageController::class, 'home'])->name('home');
Route::get('/catalog', [StaticPageController::class, 'catalog'])->name('catalog');

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function ()
{
    Route::redirect('/', 'order');
    Route::get('/order', [DashboardController::class, 'order'])->name('order');
    Route::get('/package', [DashboardController::class, 'package'])->name('package');
    // Route::post('/package', [PackageController::class, 'store'])->name('package.store');
    Route::put('/package/{package}', [PackageController::class, 'update'])->name('package.update');
    Route::get('/product', [DashboardController::class, 'product'])->name('product');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/review', [DashboardController::class, 'review'])->name('review');
    Route::get('/user', [DashboardController::class, 'user'])->name('user');
});

Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');

Route::get('/reviews', [ReviewController::class, 'index'])->name('review.index');
Route::prefix('reviews')->name('review.')->middleware('auth')->group(function ()
{
    Route::get('/create', [ReviewController::class, 'create'])->name('create');
    Route::post('/', [ReviewController::class, 'store'])->name('store');
    Route::put('/{review}', [ReviewController::class, 'update'])->name('update');
    Route::delete('/{review}', [ReviewController::class, 'destroy'])->name('delete');
});

Route::get('/purchase_history', [ProfileController::class, 'purchaseHistory'])->name('purchase_history')->middleware('auth');

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function ()
{
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::put('/update', [ProfileController::class, 'update'])->name('update');
    Route::put('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');
});

Route::prefix('order')->name('order.')->middleware('auth')->group(function ()
{
    Route::get('/', [OrderController::class, 'create'])->name('create');
    Route::post('/', [OrderController::class, 'store'])->name('store');
    Route::get('/{order}', [OrderController::class, 'show'])->name('show');
    Route::put('/{order}', [OrderController::class, 'update'])->name('update');
    Route::post('/{order}/updateStatus', [OrderController::class, 'updateStatus'])->name('updateStatus');
    Route::post('/{order}/updatePayment', [OrderController::class, 'updatePayment'])->name('updatePayment');
    Route::post('/{order}/updateReceipt', [OrderController::class, 'updateReceipt'])->name('updateReceipt');
    Route::post('/{order}/updatePrice', [OrderController::class, 'updatePrice'])->name('updatePrice');
    Route::delete('/{order}', [OrderController::class, 'destroy'])->name('delete');
});

Route::prefix('api')->name('api.')->middleware('auth')->group(function ()
{
    Route::get('/getAllPackages', [PackageController::class, 'getAllPackages'])->name('getAllPackages');
    Route::get('/getOrderImage/{id}', [OrderController::class, 'getOrderImage'])->name('getOrderImage');
});

