<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicVacationController;
use App\Http\Controllers\HoursController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [AccountController::class, "login"])->name('login');

Route::get('/', [AccountController::class, 'index'])->name("index");
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments/available-times', [AppointmentController::class, 'getAvailable'])->name('appointments.available_times');

Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

Route::get('login', [AccountController::class, 'login'])->name('login');
Route::get('sign-out', [AccountController::class, 'logout'])->name('logout');
Route::post('auth', [AccountController::class, 'auth'])->name('auth');
Route::post('/appointments/check-availability', [AppointmentController::class, 'checkAvailability'])->name('appointments.check_availability');

Route::group(['middleware' => ["auth", "admin"], 'prefix' => 'admin'], function () {
    Route::get('dashboard', [AccountController::class, 'index'])->name("admin.dashboard");
    Route::get('users', [AdminController::class, 'listUsers'])->name("admin.users");
    Route::get('users/delete/{id}', [AdminController::class, 'deleteUser'])->name("admin.delete-user");
    Route::get('bookings', [AppointmentController::class, 'index'])->name("admin.bookings");
     Route::get('hours', [HoursController::class, 'index'])->name("admin.hours");
    Route::post('opening-hours', [HoursController::class, 'store'])->name('opening-hours.store');


    Route::get('/clinic-vacations', [ClinicVacationController::class, 'index'])->name('clinic-vacations.index');
    Route::get('/clinic-vacations/create', [ClinicVacationController::class, 'create'])->name('clinic-vacations.create');
    Route::post('/clinic-vacations', [ClinicVacationController::class, 'store'])->name('clinic-vacations.store');
});


Route::group(['middleware' => ["user", "auth"], 'prefix' => 'user'], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name("user.dashboard");
    Route::get('bookings', [UserController::class, 'bookings'])->name("user.bookings");
});
