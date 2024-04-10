<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChairController;
use App\Http\Controllers\OSDSDeanController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CDeanController;
use App\Http\Controllers\USOController;
use App\Models\Complaint;
use App\Models\Student;

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

Route::post('logout', function () {
    Auth::logout();
    return redirect('/login');
  });
|
*/

Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'Authlogin'])->name('login');

Route::post('/login', [AuthController::class, 'Authlogin']);


#Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
 

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
Route::get('cdean/file-complaint', [CDeanController::class, 'fileComplaint'])->name('cdean.file-complaint');
Route::get('/complaints/{complainant_id}', function ($complainant_id) {
    $complaints = Complaint::where('complainant_id', $complainant_id)->first();
    return response()->json($complaints);
});

//OSDS Dean Views
Route::get('odean/dashboard', [OSDSDeanController::class, 'dashboard'])->name('odean.dashboard');
Route::get('odean/addnewcase', [OSDSDeanController::class, 'addnewcase'])->name('odean.addnewcase');
Route::get('odean/caserecord', [OSDSDeanController::class, 'caserecord'])->name('odean.caserecord');
Route::get('odean/search', [StudentController::class,'search' ])->name('odean.search');
Route::get('/students/{student_id}', function ($student_id) {
    $students = Student::where('student_id', $student_id)->first();
    return response()->json($students);
});


//Staff Views
Route::get('staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');

//USO Views
Route::get('uso/dashboard', [USOController::class, 'dashboard'])->name('uso.dashboard');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
