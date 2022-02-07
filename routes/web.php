<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\FrontProductListController;


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

Route::get('/{category:slug?}', [FrontProductListController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [FrontProductListController::class, 'show'])->name('prodcut.show');
// Products based on category
Route::get('/index', [AdminController::class, 'index']);
Route::get('/index/test', function () {
    return view('admin.test');
});
// Cart
Route::get('/addToCart/{product}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart/products', [CartController::class, 'showCart'])->name('cart.show');



Route::resource('category', CategoryController::class, ['as' => 'admin']);
Route::resource('/subCategory', SubCategoryController::class, ['as' => 'admin']);
Route::get('/subCategories/{id}', [SubCategoryController::class, 'getSubCategory'])->name('get.sub-category');
Route::resource('item', ItemController::class, ['as' => 'admin']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


