<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendsController;
use App\Http\Controllers\CartController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('frontends/index');
// });

Route::get('/',[FrontendsController::class,'index']);
Route::get('/detail',[FrontendsController::class,'show'])->name('products.detail');

Route::get('/cart/{id}',[CartController::class,'create'])->name('carts.create');
Route::get('/view/cart',[CartController::class,'index'])->name('carts.index');
Route::get('/cart/{id}/add',[CartController::class,'add'])->name('carts.add');
Route::get('/cart/{id}/subtract',[CartController::class,'subtract'])->name('carts.subtract');
Route::get('/cart/{id}/delete',[CartController::class,'delete'])->name('carts.delete');
Route::post('/cart/check-out',[CartController::class,'checkOut'])->name('carts.checkout');
Route::get('/message',[CartController::class,'message'])->name('carts.message');

Route::middleware('auth')->group(function(){
    Route::get('/user',[UserController::class,'create'])->name('users.create');
    Route::post('/user',[UserController::class,'store'])->name('users.store');
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/{id}',[UserController::class,'show'])->name('users.show');
    Route::get('/users/{id}/delete',[UserController::class,'destroy'])->name('users.delete');
    Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('user.edit');
    Route::post('/user/{id}',[UserController::class,'update'])->name('user.update');
    
    
    
    Route::get('/product',[ProductController::class,'create']);
    Route::post('/product',[ProductController::class,'store'])->name('products.store');
    Route::get('/products',[ProductController::class,'index'])->name('products.index');
    Route::get('/products/{id}',[ProductController::class,'edit'])->name('products.edit');
    Route::post('/products/{id}',[ProductController::class,'update'])->name('products.update');
    Route::get('/products/{id}/delete',[ProductController::class,'destroy'])->name('products.delete');
    
    Route::get('/service',[ServiceController::class,'create'])->name('services.create');
    Route::post('/service',[ServiceController::class,'store'])->name('services.store');
    Route::get('/services',[ServiceController::class,'index'])->name('services.index');
    Route::get('/services/{id}',[ServiceController::class,'edit'])->name('services.edit');
    Route::post('/services/{id}',[ServiceController::class,'update'])->name('services.update');
    Route::get('/services/{id}/delete',[ServiceController::class,'destroy'])->name('services.delete');
    Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
    Route::get('/orders/{id}',[OrderController::class,'show'])->name('orders.show');
    Route::get('/orders/{id}/delete',[OrderController::class,'delete'])->name('orders.delete');
});

Auth::routes(['register'=>false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


