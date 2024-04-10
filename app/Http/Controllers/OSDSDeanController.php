<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Employee;
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
            return view('osds.odean.addnewcase', []);
        }

        public function caserecord()
        {
            return view('osds.odean.caserecord', []);
        }

        public function searchStudents(Request $request)
        {
            $query = $request->input('query');
            $students = Student::where('student_id', 'LIKE', "%$query%")
                               ->orWhere('student_name', 'LIKE', "%$query%")
                               ->get();
            return response()->json($students);
        }
}

