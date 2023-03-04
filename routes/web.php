<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('school',\App\Http\Controllers\Admin\SchoolController::class);
//Route::resource('users', ::class);
Route::resource('role', \App\Http\Controllers\Admin\RoleController::class);
Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
