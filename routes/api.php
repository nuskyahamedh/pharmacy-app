<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [UserController::class, 'login'])->name('login');



Route::middleware('auth:sanctum')->group(function () {
    Route::post('add-item', [InventoryController::class, 'store']);
    Route::put('update-item/{id}', [InventoryController::class, 'update']);
    Route::delete('delete-item/{id}', [InventoryController::class, 'destroy']);

    Route::post('add-customer', [CustomerController::class, 'store']);
    Route::put('update-customer/{id}', [CustomerController::class, 'update']);
    Route::delete('delete-customer/{id}', [CustomerController::class, 'destroy']);
});
