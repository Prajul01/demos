<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\StudyMaterialController;
use App\Http\Controllers\Admin\AdministrationController;
use App\Http\Controllers\Admin\InfrastructureController;
use App\Http\Controllers\Admin\LunchController;
use App\Http\Controllers\Admin\EmployeegradeController;
use App\Http\Controllers\Admin\EmployeeSalaryScaleController;
use App\Http\Controllers\Admin\EmployeeGradeLimitController;
use App\Http\Controllers\Admin\EmployeeGradeScaleController;
use App\Http\Controllers\Admin\EmployeeAllowanceScaleController;
use App\Http\Controllers\Admin\LunchScaleController;
use App\Http\Controllers\Admin\ScholarshipScaleController;
use App\Http\Controllers\Admin\InfrastructureScaleController;
use App\Http\Controllers\Admin\AdministrationScaleController;
use App\Http\Controllers\Admin\SignatureController;
use App\Http\Controllers\Admin\SalarySheetController;
use App\Http\Controllers\Admin\FiscalYearController;
use App\Http\Controllers\Admin\EducationYearController;


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
Route::post('register', [\App\Http\Controllers\API\APIController::class, 'register']);
//Route::post('store', [\App\Http\Controllers\API\APIController::class, 'store']);

Route::get('/employee/list', [EmployeeController::class, 'list']);
Route::post('/employee/update/{id}', [EmployeeController::class, 'update']);
Route::get('/employee/view/{id}', [EmployeeController::class, 'view']);
Route::post('/employee/delete/{id}', [EmployeeController::class, 'destroy']);
Route::post('/employee/save', [EmployeeController::class, 'store']);


Route::get('school/list',[SchoolController::class,'list']);
Route::post('school/save',[SchoolController::class,'store']);
Route::post('school/update/{id}',[SchoolController::class,'update']);
Route::get('school/view/{id}',[SchoolController::class,'view']);
Route::post('school/delete/{id}',[SchoolController::class,'destroy']);

Route::get('scholarship/list',[ScholarshipController::class,'list']);
Route::post('scholarship/update/{id}',[ScholarshipController::class,'update']);
Route::get('scholarship/view/{id}',[ScholarshipController::class,'view']);
Route::post('scholarship/delete/{id}',[ScholarshipController::class,'destroy']);
Route::post('scholarship/save',[ScholarshipController::class,'store']);
//
Route::get('studymaterial/list',[StudyMaterialController::class,'list']);
Route::post('studymaterial/update/{id}',[StudyMaterialController::class,'update']);
Route::get('studymaterial/view/{id}',[StudyMaterialController::class,'view']);
Route::post('studymaterial/delete/{id}',[StudyMaterialController::class,'destroy']);
Route::post('studymaterial/save',[StudyMaterialController::class,'store']);
//
Route::get('administration/list',[AdministrationController::class,'list']);
Route::post('administration/update/{id}',[AdministrationController::class,'update']);
Route::get('administration/view/{id}',[AdministrationController::class,'view']);
Route::post('administration/delete/{id}',[AdministrationController::class,'destroy']);
Route::post('administration/save',[AdministrationController::class,'store']);
////
Route::get('infrastructure/list',[InfrastructureController::class,'list']);
Route::post('infrastructure/update/{id}',[InfrastructureController::class,'update']);
Route::get('infrastructure/view/{id}',[InfrastructureController::class,'view']);
Route::post('infrastructure/delete/{id}',[InfrastructureController::class,'destroy']);
Route::post('infrastructure/save',[InfrastructureController::class,'store']);
//
Route::get('lunch/list',[LunchController::class,'list']);
Route::post('lunch/update/{id}',[LunchController::class,'update']);
Route::get('lunch/view/{id}',[LunchController::class,'view']);
Route::post('lunch/delete/{id}',[LunchController::class,'destroy']);
Route::post('lunch/save',[LunchController::class,'store']);
//
//Route::resource('employeegrade',[EmployeegradeController::class,'list']);//not used anywhere
//Route::get('employeegrade_recycle',[EmployeegradeController::class,'recycle']);//test of soft delete
//
Route::get('employeesalaryscale/list',[EmployeeSalaryScaleController::class,'list']);
Route::post('employeesalaryscale/update/{id}',[EmployeeSalaryScaleController::class,'update']);
Route::get('employeesalaryscale/view/{id}',[EmployeeSalaryScaleController::class,'view']);
Route::post('employeesalaryscale/delete/{id}',[EmployeeSalaryScaleController::class,'destroy']);
Route::post('employeesalaryscale/save',[EmployeeSalaryScaleController::class,'store']);
//
Route::get('employeegradelimit/list',[EmployeeGradeLimitController::class,'list']);
Route::post('employeegradelimit/update/{id}',[EmployeeGradeLimitController::class,'update']);
Route::get('employeegradelimit/view/{id}',[EmployeeGradeLimitController::class,'view']);
Route::post('employeegradelimit/delete/{id}',[EmployeeGradeLimitController::class,'destroy']);
Route::post('employeegradelimit/save',[EmployeeGradeLimitController::class,'store']);

Route::get('employeegradescale/list',[EmployeeGradeScaleController::class,'list']);
Route::post('employeegradescale/update/{id}',[EmployeeGradeScaleController::class,'update']);
Route::get('employeegradescale/view/{id}',[EmployeeGradeScaleController::class,'view']);
Route::post('employeegradescale/delete/{id}',[EmployeeGradeScaleController::class,'destroy']);
Route::post('employeegradescale/save',[EmployeeGradeScaleController::class,'store']);

Route::get('employeeAllowanceScale/list',[EmployeeAllowanceScaleController::class,'list']);
Route::post('employeeAllowanceScale/update/{id}',[EmployeeAllowanceScaleController::class,'update']);
Route::get('employeeAllowanceScale/view/{id}',[EmployeeAllowanceScaleController::class,'view']);
Route::post('employeeAllowanceScale/delete/{id}',[EmployeeAllowanceScaleController::class,'destroy']);
Route::post('employeeAllowanceScale/save',[EmployeeAllowanceScaleController::class,'store']);

Route::get('lunchScale/list',[LunchScaleController::class,'list']);
Route::post('lunchScale/update/{id}',[LunchScaleController::class,'update']);
Route::get('lunchScale/view/{id}',[LunchScaleController::class,'view']);
Route::post('lunchScale/delete/{id}',[LunchScaleController::class,'destroy']);
Route::post('lunchScale/save',[LunchScaleController::class,'store']);

Route::get('scholarshipScale/list',[ScholarshipScaleController::class,'list']);
Route::post('scholarshipScale/update/{id}',[ScholarshipScaleController::class,'update']);
Route::get('scholarshipScale/view/{id}',[ScholarshipScaleController::class,'view']);
Route::post('scholarshipScale/delete/{id}',[ScholarshipScaleController::class,'destroy']);
Route::post('scholarshipScale/save',[ScholarshipScaleController::class,'store']);


Route::get('infrastructureScale/list',[InfrastructureScaleController::class,'list']);
Route::post('infrastructureScale/update/{id}',[InfrastructureScaleController::class,'update']);
Route::get('infrastructureScale/view/{id}',[InfrastructureScaleController::class,'view']);
Route::post('infrastructureScale/delete/{id}',[InfrastructureScaleController::class,'destroy']);
Route::post('infrastructureScale/save',[InfrastructureScaleController::class,'store']);

Route::get('administrationScale/list',[AdministrationScaleController::class,'list']);
Route::post('administrationScale/update/{id}',[AdministrationScaleController::class,'update']);
Route::get('administrationScale/view/{id}',[AdministrationScaleController::class,'view']);
Route::post('administrationScale/delete/{id}',[AdministrationScaleController::class,'destroy']);
Route::post('administrationScale/save',[AdministrationScaleController::class,'store']);

Route::get('signature/list',[SignatureController::class,'list']);
Route::post('signature/update/{id}',[SignatureController::class,'update']);
Route::get('signature/view/{id}',[SignatureController::class,'view']);
Route::post('signature/delete/{id}',[SignatureController::class,'destroy']);
Route::post('signature/save',[SignatureController::class,'store']);

Route::get('salarysheet/list',[SalarySheetController::class,'list']);
Route::post('salarysheet/update/{id}',[SalarySheetController::class,'update']);
Route::get('salarysheet/view/{id}',[SalarySheetController::class,'view']);
Route::post('salarysheet/delete/{id}',[SalarySheetController::class,'destroy']);
Route::post('salarysheet/save',[SalarySheetController::class,'store']);

Route::get('fiscalyear/list',[FiscalYearController::class,'list']);
Route::post('fiscalyear/update/{id}',[FiscalYearController::class,'update']);
Route::get('fiscalyear/view/{id}',[FiscalYearController::class,'view']);
Route::post('fiscalyear/delete/{id}',[FiscalYearController::class,'destroy']);
Route::post('fiscalyear/save',[FiscalYearController::class,'store']);

Route::get('educationyear/list',[EducationYearController::class,'list']);
Route::post('educationyear/update/{id}',[EducationYearController::class,'update']);
Route::get('educationyear/view/{id}',[EducationYearController::class,'view']);
Route::post('educationyear/delete/{id}',[EducationYearController::class,'destroy']);
Route::post('educationyear/save',[EducationYearController::class,'store']);
