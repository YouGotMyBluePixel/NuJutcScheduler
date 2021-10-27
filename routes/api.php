<?php

use App\Http\Controllers\BusRoutesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/getroutes', [BusRoutesController::class, 'getroutes']);
Route::post('/updatebus', [BusRoutesController::class, 'updatebus']);
Route::post('/deletebus', [BusRoutesController::class, 'destroy']);

