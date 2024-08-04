<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\producto;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/terminos y condiciones', function () {
    return view('terminos-condiciones');
});
Route::get('/dashboard', [producto::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users', [usersController::class, 'index'])->middleware(['auth', 'verified'])->name('users');

Route::post('/create-payment', [PaymentController::class, 'createPayment'])->name('create.payment');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::patch('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');



Route::get('/products', [producto::class, 'modProduct'])->middleware(['auth', 'verified'])->name('products');
Route::get('/product/{id}', [producto::class, 'editProduct'])->middleware(['auth', 'verified'])->name('product.edit');
Route::get('/product/delete/{id}', [producto::class, 'delete'])->middleware(['auth', 'verified'])->name('product.delete');
Route::delete('/product/{id}', [producto::class, 'destroy'])->middleware(['auth', 'verified'])->name('product.destroy');
Route::patch('/products/{id}', [producto::class, 'updateProduct'])->middleware(['auth', 'verified'])->name('product.update');
Route::post('/products/new product', [producto::class, 'newProduct'])->middleware(['auth', 'verified'])->name('new.products');
Route::get('/products/nuevo producto', function () {return view('product.newProduct');})->middleware(['auth', 'verified'])->name('formNewProduct');


Route::get('/clothes', [producto::class, 'product'])->middleware(['auth', 'verified'])->name('clothes');
Route::get('/clothes/search', [producto::class, 'productSearch'])->middleware(['auth', 'verified'])->name('clothes.search');
Route::get('/clothes/gorras', [producto::class, 'productG'])->middleware(['auth', 'verified'])->name('clothes.gorras');
Route::get('/clothes/pantalones', [producto::class, 'productP'])->middleware(['auth', 'verified'])->name('clothes.pantalones');
Route::get('/clothes/playeras', [producto::class, 'productPl'])->middleware(['auth', 'verified'])->name('clothes.playeras');

Route::get('/info-producto/{id}', [producto::class, 'info'])->middleware(['auth', 'verified'])->name('info');

Route::get('/user/{id}', [usersController::class, 'edit'])->middleware(['auth', 'verified'])->name('user.edit');
Route::patch('/user/{id}', [UsersController::class, 'update'])->middleware(['auth', 'verified'])->name('user.update');
Route::delete('/user/{id}', [UsersController::class, 'destroy'])->middleware(['auth', 'verified'])->name('user.destroy');
Route::get('/user/delete/{id}', [usersController::class, 'delete'])->middleware(['auth', 'verified'])->name('user.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
