<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoControllers;
Route::get('/productos', [ProductoControllers::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
