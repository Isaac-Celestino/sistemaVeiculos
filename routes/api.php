<?php

use App\Http\Controllers\Api\CategoriaApiController;
use App\Http\Controllers\Api\FabricanteApiController;
use App\Http\Controllers\Api\VeiculoApiController;
use Illuminate\Support\Facades\Route;

// Rotas da API para Categorias
Route::apiResource('categorias', CategoriaApiController::class);

// Rotas da API para Fabricantes
Route::apiResource('fabricantes', FabricanteApiController::class);

// Rotas da API para Veículos
Route::apiResource('veiculos', VeiculoApiController::class);