<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::view('/', 'home');

Route::controller(ProductController::class)
    ->prefix('products')
    ->name('products.')
    ->group(function () {

        Route::get('/', 'index')
            ->name('index');
    });
