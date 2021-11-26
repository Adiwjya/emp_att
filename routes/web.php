<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\AssignController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\KaryawanController;

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

Route::get('login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('loginaction',[LoginController::class, 'authenticate']);
Route::post('logoutaction',[LoginController::class, 'logout']);

Route::get('home',[HomeController::class, 'index'])->middleware('auth');

Route::get('karyawan',[KaryawanController::class, 'index'])->middleware('auth');
Route::post('karyawan/store',[KaryawanController::class, 'store']);
Route::post('karyawan/delete/{id}',[KaryawanController::class, 'delete']);
Route::post('karyawan/update/{id}',[KaryawanController::class, 'update']);
Route::get('karyawan/change/{id}',[KaryawanController::class, 'change']);

Route::get('libur',[HolidayController::class, 'index'])->middleware('auth');
Route::post('holiday/store',[HolidayController::class, 'store']);
Route::post('holiday/delete/{id}',[HolidayController::class, 'delete']);
Route::post('holiday/update/{id}',[HolidayController::class, 'update']);
Route::get('holiday/change/{id}',[HolidayController::class, 'change']);

Route::get('shift',[ShiftController::class, 'index'])->middleware('auth');
Route::post('shift/store',[ShiftController::class, 'store']);
Route::post('shift/delete/{id}',[ShiftController::class, 'delete']);
Route::post('shift/update/{id}',[ShiftController::class, 'update']);
Route::get('shift/change/{id}',[ShiftController::class, 'change']);

Route::get('assign',[AssignController::class, 'index'])->middleware('auth');

Route::get('shiftshow/{id}',[KaryawanController::class, 'k_shift'])->middleware('auth');