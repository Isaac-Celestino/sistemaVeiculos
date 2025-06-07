<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FabricanteController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('veiculos', VeiculoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('fabricantes', FabricanteController::class);
