<?php

use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\AutenthicateController;
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

/* Route::get('pacientes', [PatientController::class, 'index']);
Route::get('pacientes/{patient}', [PatientController::class, 'show']);
Route::post('pacientes', [PatientController::class, 'store']);
Route::put('pacientes/{patient}', [PatientController::class, 'update']);
Route::delete('pacientes/{patient}', [PatientController::class, 'destroy']); */


Route::post('register', [AutenthicateController::class, 'register']);

Route::post('login', [AutenthicateController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('logout', [AutenthicateController::class, 'logout']);
    Route::apiResource('patients', PatientController::class);
});