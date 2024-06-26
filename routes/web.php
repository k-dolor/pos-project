<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentTransactionController;


use Illuminate\Support\Facades\Route;

// Login Routes
Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/user/process/login', [UserController::class, 'processLogin']);

// Authenticated Routes
Route::group(['middleware' => 'auth'], function() {

    // ------------Home--------------
    Route::get('/home', [HomeController::class, 'home']);

    // ------------User ----------------------
Route::controller(UserController::class)->group(function() {
    Route::get('/users', 'list');
    Route::get('/users/show/{id}', 'show');
    Route::get('/users/create', 'create');
    Route::get('/user/edit/{id}', 'edit');
    Route::get('/user/delete/{id}', 'delete');
    Route::get('/logout', 'logout');
    Route::get('/users/search', 'search')->name('users.search');
    
    Route::post('/user/store', 'store');
    Route::post('/process/logout', 'processLogout');

    Route::put('/user/update/{user}','update');
    Route::delete('/user/destroy/{user}','destroy');

});

    //--------GENDERS ROUTESS
    Route::controller(GenderController::class)->group(function() {
        Route::get('/genders', 'list'); 
        Route::get('/gender/create', 'create');
        Route::get('/gender/show/{id}', 'show');
        Route::get('/gender/edit/{id}', 'edit');
        Route::get('/gender/delete/{id}', 'delete');

        Route::post('/gender/store', 'store');
        Route::put('/gender/update/{gender}', 'update');
        Route::delete('/gender/destroy/{gender}', 'destroy');
    });

//-------ROLE ROUTES----------
Route::get('/roles', [RoleController::class, 'list']); 
Route::get('/role/create', [RoleController::class, 'create']);
Route::get('/role/show/{id}', [RoleController::class, 'show']);
Route::get('/role/edit/{id}', [RoleController::class, 'edit']);
Route::get('/role/delete/{id}', [RoleController::class, 'delete']);


Route::post('/role/store', [RoleController::class, 'store']);
Route::put('/role/update/{role}', [RoleController::class, 'update']);
Route::delete('/role/destroy/{role}', [RoleController::class, 'destroy']);


//-------PRODUCT ROUTES -------//
Route::get('/products', [ProductController::class, 'list']); 
Route::get('/products/create', [ProductController::class, 'create']);
Route::get('/product/show/{id}', [ProductController::class, 'show']);
Route::get('/product/edit/{id}', [ ProductController::class, 'edit']);
Route::get('/product/delete/{id}', [ProductController::class, 'delete']);
Route::get('/products/search',  [ProductController::class, 'search'])->name('products.search');

Route::post('/product/store', [ProductController::class, 'store']);
Route::put('/product/update/{product}', [ ProductController::class, 'update']);
Route::delete('/product/destroy/{product}', [ProductController::class, 'destroy']);

//-------SupplierS ROUTES -------//
Route::get('/suppliers', [SupplierController::class, 'list']); 
Route::get('/suppliers/create', [SupplierController::class, 'create']);
Route::get('/supplier/show/{id}', [SupplierController::class, 'show']);
Route::get('/supplier/edit/{id}', [ SupplierController::class, 'edit']);
Route::get('/supplier/delete/{id}', [SupplierController::class, 'delete']);

Route::post('/supplier/store', [SupplierController::class, 'store']);
Route::put('/supplier/update/{supplier}', [ SupplierController::class, 'update']);
Route::delete('/supplier/destroy/{supplier}', [SupplierController::class, 'destroy']);

/// Cart----------------------//
Route::get('/cart', [CartController::class, 'showProduct'])->name('cart');
Route::get('/receipt', [CartController::class, 'receipt'])->name('receipt');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/receipt', [CartController::class, 'receipt'])->name('receipt');


//P.Transaciton---------------//
Route::get('/payment-transactions', [PaymentTransactionController::class, 'index'])->name('payment-transactions.index');


});

// Route::get('/home', function () {
//     return view('home');
// });



