<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Violation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
            'date_and_time' => 'nullable|date',
            'offense' => 'required|array',
            'reported_by' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'office' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'acknowledgement' => 'required|boolean',
            'student_signature' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'student_contact_number' => 'nullable|string|max:255',
        ]);

        // Store files and get their paths if they exist
        $reportedByPath = $request->file('reported_by') ? $request->file('reported_by')->store('uploads') : null;
        $studentSignaturePath = $request->file('student_signature') ? $request->file('student_signature')->store('uploads') : null;
        
        // Log the incoming request data for debugging
        Log::info('Validated Data: ', $validatedData);

        foreach ($validatedData['offense'] as $offense) {
            // Insert the data into the database for each offense
            Violation::create([
                'student_id' => $validatedData['student_id'],
                'college' => $validatedData['college'],
                'course' => $validatedData['course'],
                'year_and_block' => $validatedData['year_and_block'],
                'date_and_time' => $validatedData['date_and_time'] ?? now(), // Use current date and time if not provided
                'offense' => $offense,
                'reported_by' => $reportedByPath,
                'office' => $validatedData['office'] ?? '',
                'contact_number' => $validatedData['contact_number'] ?? '',
                'acknowledgement' => $validatedData['acknowledgement'],
                'student_signature' => $studentSignaturePath,
                'student_contact_number' => $validatedData['student_contact_number'] ?? '',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Determine the redirection based on the user type
        $userType = Auth::user()->user_type; // Assuming you have user_type in your user model
        if ($userType == 2) {
            return redirect()->route('staff.dashboard')->with('success', 'Violation submitted successfully');
        } elseif ($userType == 3) {
            return redirect()->route('odean.dashboard')->with('success', 'Violation submitted successfully');
        } elseif ($userType == 6) {
            return redirect()->route('uso.dashboard')->with('success', 'Violation submitted successfully');
        } else {
            return redirect()->back()->with('error', 'Unauthorized user type'); // Or handle the error as needed
        }
    }
}
