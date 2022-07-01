<?php

use App\Http\Controllers\Api\UserController;
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

Route::get('/tes', function () {
    return 'tes api';
});
Route::post('/signin', [UserController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', [UserController::class, 'me']);
    Route::post('/edit', [UserController::class, 'edit']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});