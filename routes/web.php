<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['role'])->group(function () {
    Route::resource('role', RoleController::class);
    Route::resource('module', \App\Http\Controllers\Admin\ModuleController::class);
    Route::resource('permission', \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::get('role/assign_permission/{role_id}', [RoleController::class,'assignPermission'])->name('role.assign_permission');
    Route::post('role/assign_permission', [RoleController::class,'postPermission'])->name('role.post_permission');
        // Uses first & second middleware...
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('school',\App\Http\Controllers\Admin\SchoolController::class);
//Route::resource('users', ::class);

