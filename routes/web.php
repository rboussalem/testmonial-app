<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TestmonialAdminController;
use App\Http\Controllers\Guest\TestmonialGuestController;
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

Route::group([
    'as' => 'guest.'
], function () {
    Route::group(['as' => 'testmonial.'], function () {
        Route::get('/', [TestmonialGuestController::class, 'index'])->name('index');
        Route::post('/', [TestmonialGuestController::class, 'store'])->name('store');
    });
});
Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::group(['as' => 'testmonial.'], function () {
        Route::get('/', [TestmonialAdminController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [TestmonialAdminController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TestmonialAdminController::class, 'update'])->name('update');
        Route::get('/change-order', [TestmonialAdminController::class, 'change_order'])->name('change_order');
    });
});

// Auth::routes();
Auth::routes(['register' => false, 'reset' => false]);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
