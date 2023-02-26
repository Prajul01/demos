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
Route::resource('employeegrade',\App\Http\Controllers\Admin\EmployeegradeController::class);//not used anywhere
Route::get('employeegrade_recycle',[\App\Http\Controllers\Admin\EmployeegradeController::class,'recycle']);//test of soft delete
Route::resource('employeesalaryscale',\App\Http\Controllers\Admin\EmployeeSalaryScaleController::class);
Route::resource('employeegradelimit',\App\Http\Controllers\Admin\EmployeeGradeLimitController::class);
Route::resource('employeegradescale',\App\Http\Controllers\Admin\EmployeeGradeScaleController::class);
Route::resource('employeeAllowanceScale',\App\Http\Controllers\Admin\EmployeeAllowanceScaleController::class);
Route::resource('lunchScale',\App\Http\Controllers\Admin\LunchScaleController::class);
Route::resource('scholarshipScale',\App\Http\Controllers\Admin\ScholarshipScaleController::class);

Route::resource('infrastructureScale',\App\Http\Controllers\Admin\InfrastructureScaleController::class);
Route::resource('administrationScale',\App\Http\Controllers\Admin\AdministrationScaleController::class);
Route::resource('signature',\App\Http\Controllers\Admin\SignatureController::class);
Route::resource('salarysheet',\App\Http\Controllers\Admin\SalarySheetController::class);
Route::resource('fiscalyear',\App\Http\Controllers\Admin\FiscalYearController::class);
Route::resource('educationyear',\App\Http\Controllers\Admin\EducationYearController::class);
