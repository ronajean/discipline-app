<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Models\Complaint;

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

    public function fileComplaint()
    {
        #$complaints = Complaint::all(); // Assuming 'Complaint' is your model name
        return view('chair.complaint-report', [
            #'complaints' => $complaints,
        ]);
    }
}
