<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TraController;
use App\Http\Controllers\NidaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/confirm-nida',[UserController::class,'verify_nida']);


//get tra account info

//verifyf phone
Route::post('/verify-nida', [NidaController::class,'verify_nida']);

Route::post('/verify-phone', [NidaController::class,'verify_phone']);

Route::post('/my-info',[NidaController::class,'get_info']);