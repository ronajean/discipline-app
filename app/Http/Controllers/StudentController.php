<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\Gmrcrequest;
use App\Models\Course;
use App\Models\College;
use App\Models\Complaintinbox;
use App\Models\Gmcrequest;


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

        foreach ($students as $student) {
            $courses = Course::where('degree_program_id', $student->degree_program_id)->get();        

            foreach ($courses as $course) {
                $college = College::where('college_id', $course->college_id)->get();   
            }   
        }
        

        // Then, pass the data to the view
        return view('student.dashboard', [
            'students' => $students,
            'courses' => $courses,
            'colleges' => $college,
        ]);
    }
    
    public function search(Request $request)
    {
        $students = Student::where('name', 'like', '%' . $request->query . '%')->get();
        return response()->json($students);
    }

    public function complaintReport()
    {
        $userId = Auth::user()->id;
        $students = Student::where('id', $userId)->get();

        foreach ($students as $student) {
            $studentComplaints = Complaintinbox::where('student_no', $student->student_no)->get();
        }

        // Then, pass the data to the view
        return view('student.complaint-report', [
            'studentComplaints' => $studentComplaints,
            
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
        foreach ($students as $student) {
            $courses = Course::where('degree_program_id', $student->degree_program_id)->get();  
        }

        // Then, pass the data to the view
        return view('student.complaint-form', [
            'students' => $students,
            'courses' => $courses,
            
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
        $userId = Auth::user()->id;
        $students = Student::where('id', $userId)->get();

        foreach ($students as $student) {            
            $gmc_request = Gmcrequest::where('student_no', $student->student_no)->get();  
        }

        return view('student.gmc-status', [
            'gmc_request' => $gmc_request,
        ]);
    }

    public function gmcPayment()
    {
        $userId = Auth::user()->id;
        $students = Student::where('id', $userId)->get();

        foreach ($students as $student) {            
            $gmc_request = Gmcrequest::where('student_no', $student->student_no)->first();  
            
        }
        

        return view('student.gmc-payment', [
            'gmc_request' => $gmc_request,

        ]);
    }

    public function gmcRequest()
    {

        $userId = Auth::user()->id;
        $students = Student::where('id', $userId)->get();
       
        foreach ($students as $student) {
            $courses = Course::where('degree_program_id', $student->degree_program_id)->get();        

            foreach ($courses as $course) {
                $college = College::where('college_id', $course->college_id)->get();   
            }   
        }

        // Then, pass the data to the view
        return view('student.gmc-request', [
            'students' => $students,
            'courses' => $courses,
            'colleges' => $college,
        ]);
    }

    public function gmcClaim()
    {
        return view('student.gmc-claim-stub', []);
    }

    public function storeGmcRequest(Request $request)
    {
        

        // Redirect back to the GMC status page with a success message
        return redirect()->route('student.gmc-status')->with('success', 'GMC request submitted successfully.');
    }
}