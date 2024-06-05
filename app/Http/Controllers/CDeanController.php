<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class CDeanController extends Controller
{
    public function dashboard()
    {
        // Fetch data related to the student from the database
        // For example, you might fetch the student's courses, grades, etc.

        $complaints = Complaint::with('complainant')->get();
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();
        
        #$complainant = Complaint::with('complainant')->get();

        // Then, pass the data to the view
        return view('cdean.dashboard', compact('complaints'), [
            'employees' => $employees,
            'complaints' => $complaints,
            #'complainant' => $complainant,
            
            
            // 'courses' => $courses,
            // 'grades' => $grades,
            // etc.
        ]);
    }

    public function fileComplaint()
    {
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();
        $complaints = Complaint::all();
        return view('cdean.complaint-report', [
            'complaints' => $complaints,
            'employees' => $employees,
            // 'courses' => $courses,
            // 'grades' => $grades,
            // etc.
        ]);
    }
}
