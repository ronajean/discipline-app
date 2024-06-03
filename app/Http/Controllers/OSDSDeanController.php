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
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();

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
        $violations = Violation::select('student_id', 'year', 'block', 'offense', 'student_contact_number',)
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
