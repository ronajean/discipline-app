<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Violation;

class ViolationsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'year' => 'required',
            'block' => 'required',
            'date_and_time' => 'required|date',
            'offense' => 'required',
            'reported_by' => 'required|image',
            'office' => 'required',
            'contact_number' => 'required',
            'acknowledgement' => 'required|boolean',
            'student_signature' => 'required|image',
            'student_contact_number' => 'required',
            'reference_record' => 'required|mimes:pdf',
            'verified_by' => 'required',
            'remarks' => 'required'
        ]);
    
        // Store the image and PDF files
        $reportedByPath = $request->file('reported_by')->store('uploads');
        $studentSignaturePath = $request->file('student_signature')->store('uploads');
        $referenceRecordPath = $request->file('reference_record')->store('uploads');
    
        // Insert the other data into the database
        Violation::create([
            'student_id' => $validatedData['student_id'],
            'year' => $validatedData['year'],
            'block' => $validatedData['block'],
            'date_and_time' => $validatedData['date_and_time'],
            'offense' => $validatedData['offense'],
            'reported_by' => $reportedByPath,
            'office' => $validatedData['office'],
            'contact_number' => $validatedData['contact_number'],
            'acknowledgement' => $validatedData['acknowledgement'],
            'student_signature' => $studentSignaturePath,
            'student_contact_number' => $validatedData['student_contact_number'],
            'reference_record' => $referenceRecordPath,
            'verified_by' => $validatedData['verified_by'],
            'remarks' => $validatedData['remarks']
        ]);
    
        return response()->json(['message' => 'Report filed successfully']);
    }
}
