<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticuloController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/ping', function () {
    return response()->json(['status' => 'Servidor en línea y reconociendo Postman'], 200);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categorias', CategoriaController::class);
//Route::apiResource('articulos', ArticuloController::class);
    Route::get('articulos', [ArticuloController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    });

?>
