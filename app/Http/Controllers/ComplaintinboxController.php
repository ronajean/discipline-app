<?php

namespace App\Http\Controllers;

use App\Models\Complaintinbox;
use Illuminate\Http\Request;

class ComplaintinboxController extends Controller
{
    //function to store the complaint in complaint form to the database (complaints_inbox table)
    public function storeStudentComplaint(Request $request)
    {
        $validated = $request->validate([ //validate the data
            'student_no' => 'required|string|max:10',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:4294967295'
        ]);

        

        Complaintinbox::create([ 
            'student_no' => $validated['student_no'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'middle_name' => $validated['middle_name'],
            'apprehension_date' => $validated['date'],
            'apprehension_time' => $validated['time'],
            'location' => $validated['location'],
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('success', 'Complaint submitted successfully');
    }
}
