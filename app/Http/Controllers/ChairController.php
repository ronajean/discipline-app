<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Models\Complaint;
use App\Models\Student;
class ChairController extends Controller
{
    public function dashboard()
    {
        // Fetch data related to the student from the database
        // For example, you might fetch the student's courses, grades, etc.
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();
        $complaints = Complaint::all(); 

        // Then, pass the data to the view
        
        /*$complaints = Complaint::all();
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();*/

        // Then, pass the data to the view
        return view('chair.dashboard', [
            'employees' => $employees,
            'complaints' => $complaints,
        ]);
    }

    public function inbox(){
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();
        return view('chair.inbox',[
            'employees' => $employees,
        ]);
    }

    public function fileComplaint()
    {
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();
        $students = Student::all();
        return view('chair.file-complaint', [
            'students' => $students,
            'employees' => $employees,
            // 'courses' => $courses,
            // 'grades' => $grades,
            // etc.
        ]);
    }

    public function complaintReport()
    {
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();
        $complaints = Complaint::all();
        return view('chair.complaint-report', [
            'complaints' => $complaints,
            'employees' => $employees,
            // 'courses' => $courses,
            // 'grades' => $grades,
            // etc.
        ]);
    }

}
