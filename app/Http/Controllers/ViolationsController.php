<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Violation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ViolationsController extends Controller
{
    public function store(Request $request)
    {
        $request->merge(['acknowledgement' => $request->has('acknowledgement') ? 1 : 0]);

        $validatedData = $request->validate([
            'student_id' => 'required|string|max:100',
            'college' => 'required|string|max:100',
            'course' => 'required|string|max:100',
            'year_and_block' => 'required|string|max:255',
            'date_and_time' => 'required|date',
            'offense' => 'required|array',
            'reported_by' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'office' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'acknowledgement' => 'required|boolean',
            'student_signature' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'student_contact_number' => 'required|string|max:255',
        ]);

        // Store files and get their paths
        $reportedByPath = $request->file('reported_by')->store('uploads');
        $studentSignaturePath = $request->file('student_signature')->store('uploads');
        
        // Log the incoming request data for debugging
        Log::info('Validated Data: ', $validatedData);

        foreach ($validatedData['offense'] as $offense) {
            // Insert the data into the database for each offense
            Violation::create([
                'student_id' => $validatedData['student_id'],
                'college' => $validatedData['college'],
                'course' => $validatedData['course'],
                'year_and_block' => $validatedData['year_and_block'],
                'date_and_time' => $validatedData['date_and_time'],
                'offense' => $offense,
                'reported_by' => $reportedByPath,
                'office' => $validatedData['office'],
                'contact_number' => $validatedData['contact_number'],
                'acknowledgement' => $validatedData['acknowledgement'],
                'student_signature' => $studentSignaturePath,
                'student_contact_number' => $validatedData['student_contact_number'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('uso.dashboard')->with('success', 'Complaint submitted successfully');
    }
}
