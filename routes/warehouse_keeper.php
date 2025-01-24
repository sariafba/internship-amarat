<?php

use App\Http\Controllers\WarehouseKeeper\AuthController;
use App\Http\Controllers\WarehouseKeeper\MaterialExchangeController;
use App\Http\Controllers\WarehouseKeeper\MaterialExchangeWorkerController;
use App\Http\Controllers\WarehouseKeeper\SupervisorController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth.api:warehouseKeeper'], function(){

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('supervisor/index', [SupervisorController::class, 'index']);

    Route::group(['prefix' => 'material-exchange/'], function(){
        Route::get('/index', [MaterialExchangeController::class, 'index']);
        Route::get('/export', [MaterialExchangeController::class, 'export']);
    });

    Route::get('material-exchange-worker/index', [MaterialExchangeWorkerController::class, 'index']);
});
