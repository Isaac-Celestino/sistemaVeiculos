<?php


use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CombustivelController;

Route::get('/', function () {
    return redirect()->route('veiculos.index');
});

// Rotas para Veículos
Route::resource('veiculos', VeiculoController::class);

// Rotas para Categorias
Route::resource('categorias', CategoriaController::class);

// Rotas para Fabricantes
Route::resource('fabricantes', FabricanteController::class);

// Rotas para combustivel
Route::resource('combustivel', CombustivelController::class);