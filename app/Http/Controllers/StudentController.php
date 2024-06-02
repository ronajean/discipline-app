<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\Gmrcrequest;


class StudentController extends Controller
{
    /**
     * Show the student dashboard.
     *

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
    
    public function search(Request $request)
    {
        $students = Student::where('name', 'like', '%' . $request->query . '%')->get();
        return response()->json($students);
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
        $userId = Auth::user()->id;
        $students = Student::where('id', $userId)->get();

        // Then, pass the data to the view
        return view('student.complaint-form', [
            'students' => $students,
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

        $userId = Auth::user()->id;
        $students = Student::where('id', $userId)->get();

        // Then, pass the data to the view
        return view('student.gmc-request', [
            'students' => $students,
        ]);
    }

    public function gmcClaim()
    {
        return view('student.gmc-claim-stub', []);
    }

    public function storeGmcRequest(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'date_of_request' => 'required|date',
            'student_number' => 'required|string',
            'student_name' => 'required|string',
            'contact_number' => 'required|string',
            'purpose' => 'required|string|max:500',
        ]);

        // Create a new GMC request record in the database
        Gmrcrequest::create([
            'date_of_request' => $request->date_of_request,
            'student_number' => $request->student_number,
            'student_name' => $request->student_name,
            'contact_number' => $request->contact_number,
            'purpose' => $request->purpose,
        ]);

        // Redirect back to the GMC status page with a success message
        return redirect()->route('student.gmc-status')->with('success', 'GMC request submitted successfully.');
    }
}