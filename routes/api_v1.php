<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomAuthControllers\CreateNewUserController;
use App\Http\Controllers\Api\V1\Auth\AuthController;
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
//Route::post('/register', [CreateNewUserController::class, 'store']);
//Route::resource('vehicle', VehicleController::class);
Route::get('/vehicle', [VehicleController::class, 'show']);

Route::post('/new_account', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
