<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChairController;
use App\Http\Controllers\OSDSDeanController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CDeanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!

Route::get('/', function () {
    return view('student.dashboard');
});
|
*/

Route::get('/', [AuthController::class, 'login']);


Route::post('login', [AuthController::class, 'Authlogin']);
Route::get('logout', [AuthController::class, 'logout']);
 

/*
Route::group(['middleware' => 'staff'], function () {
    Route::get('staff/dashboard', function () {
        return view('staff.dashboard');
    });
});

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
});

Route::group(['middleware' => 'CollegeChair'], function () {
    Route::get('chair/dashboard', function () {
        return view('chair.dashboard');
    });
});

Route::group(['middleware' => 'OSDSDean'], function () {
    Route::get('odean/dashboard', function () {
        return view('odean.dashboard');
    });
});


Route::group(['middleware' => 'cdean'], function () {
    Route::get('cdean/dashboard', function () {
        return view('cdean.dashboard');
    });
});

*/

//Student Views
Route::get('student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
Route::get('student/complaint-report', [StudentController::class, 'complaintReport'])->name('student.complaint-report');
Route::get('student/complaint-form', [StudentController::class, 'complaintForm'])->name('student.complaint-form');
Route::get('student/student-manual', [StudentController::class, 'studentManual'])->name('student.manual');
Route::get('student/gmc-status', [StudentController::class, 'gmcStatus'])->name('student.gmc-status');
Route::get('student/gmc-payment', [StudentController::class, 'gmcPayment'])->name('student.gmc-payment');
Route::get('student/gmc-request', [StudentController::class, 'gmcRequest'])->name('student.gmc-request');
Route::get('student/gmc-claim-stub', [StudentController::class, 'gmcClaim'])->name('student.gmc-claim-stub');



//Chair Views
Route::get('chair/dashboard', [ChairController::class, 'dashboard'])->name('chair.dashboard');


//College Dean Views
Route::get('cdean/dashboard', [CDeanController::class, 'dashboard'])->name('cdean.dashboard');


//OSDS Dean Views
Route::get('odean/dashboard', [OSDSDeanController::class, 'dashboard'])->name('odean.dashboard');


//Staff Views
Route::get('staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');


