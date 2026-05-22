<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticuloController;
use App\Http\Controllers\Api\CategoriaController;

Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('articulos', ArticuloController::class);
Route::get('/ping', function () {
    return response()->json(['status' => 'Servidor en línea y reconociendo Postman'], 200);
});

?>
