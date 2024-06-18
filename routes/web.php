<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
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
Route::get('dashboard', [DashboardController::class, 'admin_index']);

Route::get('staff', [StaffController::class, 'admin_index']);
Route::get('addstaff', [StaffController::class, 'admin_create']);
Route::post('addstaff/store', [StaffController::class, 'admin_store'])->name('addstaff.store');
Route::get('staff/{id}/editstaff', [StaffController::class, 'admin_edit']);
Route::post('editstaff/update', [StaffController::class, 'admin_update'])->name('editstaff.update');

Route::get('attendance', [AttendanceController::class, 'admin_index']);

Route::get('calender', [CalenderController::class, 'admin_index']);

Route::get('report', [ReportController::class, 'admin_index']);

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');