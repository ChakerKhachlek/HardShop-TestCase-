<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/', \App\Http\Livewire\Shop\ShopHomeComponent::class)->name('shop.home');
//Admin->auth Routes
Route::get('/auth', [App\Http\Controllers\HomeController::class, 'auth'])->name('auth.view');

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin',[App\Http\Controllers\HomeController::class, 'adminView'])->name('admin.view');
    Route::view('admin/categories', 'admin.categories.manageCategories')->name('manageCategories');
    Route::view('admin/subcategories', 'admin.subcategories.manageSubCategories')->name('manageSubCategories');
    Route::view('admin/products', 'admin.products.manageProducts')->name('manageProducts');
});
