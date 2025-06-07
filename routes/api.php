<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VeiculoApiController;

Route::middleware('api')->group(function () {
    Route::apiResource('veiculos', VeiculoApiController::class);
});
