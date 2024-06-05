<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Employee;
use App\Models\Violation;
use App\Models\Complaint;   
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class StaffController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();

        $violationsSummary = Violation::select('course')
            ->selectRaw('Count(*) as count')
            ->groupBy('course')
            ->get();

        // Fetch the latest 10 records from each table
        $violations = Violation::latest()->take(10)->get();
        $complaints = Complaint::latest()->take(10)->get();

        // Add a 'title' field to each record dynamically
        $violations->each(function ($item) {
            $item->title = 'Violation: ' . $item->offense;
            $item->message = 'Occurred on ' . $item->created_at->format('F j, Y, g:i a');
        });

        $complaints->each(function ($item) {
            $item->title = 'Complaint: ' . $item->subject;
            $item->message = 'Filed on ' . $item->created_at->format('F j, Y, g:i a');
        });

        // Combine all violations and complaints into one collection
        $allNotifications = $violations->concat($complaints);

        // Sort by created_at field in descending order
        $allNotifications = $allNotifications->sortByDesc('created_at');

        return view('staff.dashboard', [
            'employees' => $employees,
            'violations' => $violationsSummary,
            'allNotifications' => $allNotifications,
        ]);
    }

    public function addnewcase()
    {
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();
        $students = Student::all();
        return view('staff.addnewcase', [
            'students' => $students,
            'employees' => $employees,
        ]);
    }

    public function caserecord()
    {
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();
        $violations = Violation::all();

        return view('staff.caserecord', [
            'violations' => $violations,
            'employees' => $employees,

        ]);
    }

    public function archive()
    {
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();

        return view('staff.archive', [
            'employees' => $employees,
            
        ]);
    }

    public function gmcrequest()
    {
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();

        return view('staff.gmcrequest', [
            'employees' => $employees,
            
        ]);
    }
}
