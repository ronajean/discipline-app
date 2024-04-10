<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
Use App\Models\Employee;
use App\Models\Complaint;
class ChairController extends Controller
{
    public function dashboard()
    {
        // Fetch data related to the student from the database
        // For example, you might fetch the student's courses, grades, etc.

        // Then, pass the data to the view
        
        $complaints = Complaint::all();
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();

        // Then, pass the data to the view
        return view('chair.dashboard', [
            'employees' => $employees,
            'complaints' => $complaints,
        ]);
    }
}
