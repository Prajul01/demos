<?php

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
Route::post('store', [\App\Http\Controllers\API\APIController::class, 'store']);
Route::post('login', [\App\Http\Controllers\API\APIController::class, 'login']);
Route::post('store', [\App\Http\Controllers\API\APIController::class, 'store']);
Route::resource('school',\App\Http\Controllers\Admin\SchoolController::class);
Route::resource('employee',\App\Http\Controllers\Admin\EmployeeController::class);
Route::resource('scholarship',\App\Http\Controllers\Admin\ScholarshipController::class);
Route::resource('studymaterial',\App\Http\Controllers\Admin\StudyMaterialController::class);
Route::resource('administration',\App\Http\Controllers\Admin\AdministrationController::class);
Route::resource('infrastructure',\App\Http\Controllers\Admin\InfrastructureController::class);
Route::resource('lunch',\App\Http\Controllers\Admin\LunchController::class);

