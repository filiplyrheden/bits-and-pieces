<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;


Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', LoginController::class);

Route::controller(ProductController::class)
    ->prefix('products')
    ->name('products.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'index')
            ->name('index');

        Route::get('/create', 'create')
            ->name('create');

        Route::post('/store', 'store')
            ->name('store');

        Route::get('/{product}', 'show')
            ->name('show');

        Route::get('/{product}/edit', 'edit')
            ->name('edit');

        Route::patch('/{product}', 'update')
            ->name('update');

        Route::delete('/{product}', 'destroy')
            ->name('destroy');
    });

Route::get('/logout', [App\Http\Controllers\LogoutController::class, '__invoke'])->middleware('auth');
