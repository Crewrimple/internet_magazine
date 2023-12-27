<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'indexMain'])->name('welcome');

Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class, 'loginPost']);

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerPost']);
Route::get('/product/{product}', [ProductController::class, 'firstProduct'])->name('product');

Route::middleware('auth')->group(function() {

    Route::middleware('role:admin')->group(function() {

        Route::middleware('role:admin')->group(function() {
            Route::group(['prefix' => '/admin', 'as' => 'admin.'], function() {
                Route::resource('/product', ProductController::class);
            });
            Route::get('/completed/{order}', [OrderController::class, 'completed'])->name('completed');
        });

        Route::group(['prefix' => '/order', 'as' => 'order.'], function() {


            Route::get('/basket', [OrderController::class, 'basket'])->name('basket');
            Route::post('/basket', [OrderController::class, 'basketPost']);  

            
            Route::get('/addBasket', [OrderController::class, 'addBasket'])->name('addBasket');


            Route::post('/createOrder', [OrderController::class, 'createOrder'])->name('createOrder');


            Route::get('/all/{myOrder?}', [OrderController::class, 'orders'])->name('all');
            
            Route::get('/cancel/{order}', [OrderController::class, 'cancel'])->name('cancel');
        });
    });

    Route::get('/cabinet', [UserController::class, 'cabinet'])->name('cabinet');
    Route::get('/cabinet/edit', [UserController::class, 'cabinetEdit'])->name('cabinetEdit');
    Route::post('/cabinet/edit', [UserController::class, 'cabinetEditPost']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
