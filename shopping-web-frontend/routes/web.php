<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/login',[CustomerController::class,'loginCustomer'])->name('customer.login');

Route::post('/login',[CustomerController::class,'postloginCustomer'])->name('post.login');

Route::get('/logout',[CustomerController::class,'logout'])->name('customer.logout');

//

Route::get('/cat/{slug}/{id}',[CategoryController::class,'index'])->name('category.index');

Route::get('/prod/{slug?}/{id}',[ProductController::class,'index'])->name('product.index');

Route::get('/cart',[CartController::class,'index'])->name('cart.index');

Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');

Route::post('/checkout',[CheckoutController::class,'orderSuccess'])->name('checkout.orderSuccess');
