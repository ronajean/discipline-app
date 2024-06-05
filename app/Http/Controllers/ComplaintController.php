<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function store(Request $request){

        $validatedData = $request->validate([
            'complainant_id' => 'required|string|max:100',
            'complainee_id' => 'required|string|max:100',
            'submission_date' => 'required|date',
            'nature_and_case' => 'required|string',
        ]);

        Complaint::create([
            'complainant_id' => $validatedData['complainant_id'],
            'complainee_id' => $validatedData['complainee_id'],
            'submission_date' => $validatedData['submission_date'],
            'nature_and_case' => $validatedData['nature_and_case'],
        ]);

        return redirect()->route('chair.file-complaint')->with('success', 'Complaint submitted successfully');

    }
}
