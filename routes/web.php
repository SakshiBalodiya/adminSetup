<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
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
Route::get('staff/{id}/delete', [StaffController::class, 'admin_destroy']);

Route::get('attendance', [AttendanceController::class, 'admin_index']);

Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('calendar', [CalendarController::class, 'admin_index']);
Route::post('calendar/store', [CalendarController::class, 'admin_store'])->name('calendar.store');
Route::get('calendar/{id}/delete', [CalendarController::class, 'admin_destroy']);

Route::get('report', [ReportController::class, 'admin_index']);

Route::get('settings', [SettingsController::class, 'admin_index']);
Route::post('settings/update', [SettingsController::class, 'admin_update'])->name('settings.update');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');