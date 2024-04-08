<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Show the student dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // Fetch data related to the student from the database
        // For example, you might fetch the student's courses, grades, etc.

        #$students = Student::all();
        $userId = Auth::user()->id;
        $students = Student::where('id', $userId)->get();
        

        // Then, pass the data to the view
        return view('student.dashboard', [
            'students' => $students,
        ]);
    }

    public function complaintReport()
    {
        // Fetch data related to the student from the database
        // For example, you might fetch the student's courses, grades, etc.

        // Then, pass the data to the view
        return view('student.complaint-report', [
            // 'courses' => $courses,
            // 'grades' => $grades,
            // etc.
        ]);
    }

    public function complaintForm()
    {
        // Fetch data related to the student from the database
        // For example, you might fetch the student's courses, grades, etc.

        // Then, pass the data to the view
        return view('student.complaint-form', [
            // 'courses' => $courses,
            // 'grades' => $grades,
            // etc.
        ]);
    }

    public function studentManual()
    {
        return view('student.student-manual', [
            // 'courses' => $courses,
            // 'grades' => $grades,
            // etc.
        ]);
    }

    public function gmcStatus()
    {
        return view('student.gmc-status', []);
    }

    public function gmcPayment()
    {
        return view('student.gmc-payment', []);
    }

    public function gmcRequest()
    {
        return view('student.gmc-request', []);
    }

    public function gmcClaim()
    {
        return view('student.gmc-claim-stub', []);
    }
}