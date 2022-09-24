<?php

use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\API\AutenthicateController;
use App\Http\Controllers\API\NurseController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AutenthicateController::class, 'register']);
Route::post('login', [AutenthicateController::class, 'login']);

Route::post('registerRole', [AutenthicateController::class, 'registerRole']);
Route::get('showRolesUser', [AutenthicateController::class, 'showRolesUser']);


Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('logout', [AutenthicateController::class, 'logout']);
    Route::apiResource('patients', PatientController::class);
    Route::apiResource('nurses', NurseController::class);
});