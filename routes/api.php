<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('/departments',DepartmentController::class)->except('destroy');
    Route::apiResource('/divisions',DivisionController::class)->except('destroy');
    
    
    
    
});
