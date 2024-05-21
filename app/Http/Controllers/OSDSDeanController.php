<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Employee;
use App\Models\Violation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OSDSDeanController extends Controller
{
    public function dashboard()
    {
        // Fetch data related to the student from the database
        // For example, you might fetch the student's courses, grades, etc.

        // Then, pass the data to the view
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();

        // Then, pass the data to the view
        return view('osds.odean.dashboard', [
            'employees' => $employees,
        ]);
    }

    public function addnewcase()
        {
        $students = Student::all();
        return view('osds.odean.addnewcase', [
            'students' => $students,
        ]);
    }

    public function caserecord()
    {
        $violations = Violation::select('student_id', 'year', 'block', 'offense', 'student_contact_number', 'reference_record')
            ->get();

        return view('osds.odean.caserecord', [
            'violations' => $violations
        ]);
    }

    public function admin()
    {
        $userId = Auth::user()->id;
        $employees = Employee::where('designation', 'OSDS')->get();

        return view('osds.odean.admin', [
            'employees' => $employees
        ]);
    }
 
}