<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Leave\LeaveController;
use App\Http\Controllers\Leave\ManageLeaveController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function () {
    return view('Admin.Admin-Layouts.app');
});

Route::get('/dashboard', function () {
    return view('Admin.Admin-Dashboard.dashboard');
});

//Login & Register Routes
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'postLogin'])->name('postlogin');
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'postRegister'])->name('postregister');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Employee Routes 

// Only admin users can access employee-related routes
Route::resource('/employee', EmployeeController::class);

//Employee Leaves Routes 
Route::resource('/leaves', LeaveController::class);
Route::get('/manage-leave', [ManageLeaveController::class, 'index']);
Route::post('/manage-leave/update-status', [ManageLeaveController::class, 'updateStatus'])->name('manage-leave.update-status');



