<?php

use App\Http\Controllers\Supervisor\AuthController;
use App\Http\Controllers\Supervisor\ConstructionController;
use App\Http\Controllers\Supervisor\FloorNameController;
use App\Http\Controllers\Supervisor\MaterialExchangeController;
use App\Http\Controllers\Supervisor\MaterialExchangeWorkerController;
use App\Http\Controllers\Supervisor\PatternController;
use App\Http\Controllers\Supervisor\PieceController;
use App\Http\Controllers\Supervisor\ProjectController;
use App\Http\Controllers\Supervisor\WorkController;
use App\Http\Controllers\Supervisor\WorkerController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth.api:supervisor'], function(){

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::group(['prefix' => '/project'], function(){
        Route::get('/index', [ProjectController::class, 'index']);
    });

    Route::group(['prefix' => '/pattern'], function(){
        Route::get('/index', [PatternController::class, 'index']);
    });

    Route::group(['prefix' => '/piece'], function(){
        Route::get('/index', [PieceController::class, 'index']);
    });

    Route::group(['prefix' => '/construction'], function(){
        Route::get('/index', [ConstructionController::class, 'index']);
    });

    Route::group(['prefix' => '/floor'], function(){
        Route::get('/index', [FloorNameController::class, 'index']);
    });

    Route::group(['prefix' => '/work'], function(){
        Route::get('/index', [WorkController::class, 'index']);
    });

    Route::group(['prefix' => '/material-exchange'], function(){
        Route::get('/index', [MaterialExchangeController::class, 'index']);
        Route::post('/store', [MaterialExchangeController::class, 'store']);
        Route::post('/update/{id}', [MaterialExchangeController::class, 'update']);
        Route::get('/export', [MaterialExchangeController::class, 'export']);

    });

    Route::group(['prefix' => '/material-exchange-worker'], function(){
        Route::get('/index', [MaterialExchangeWorkerController::class, 'index']);
        Route::post('/store', [MaterialExchangeWorkerController::class, 'store']);
        Route::post('/delete/{id}', [MaterialExchangeWorkerController::class, 'destroy']);
    });

    Route::group(['prefix' => '/worker'], function(){
        Route::get('/index', [WorkerController::class, 'index']);
    });

});




