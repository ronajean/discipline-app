<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewCase;

class NewCaseController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'student_name' => 'required',
            'year' => 'required',
            'block' => 'required',
            'date_and_time' => 'required|date',
            'offense' => 'required',
            'description' => 'required',
        ]);
    
        // Insert the other data into the database
        $new_cases = NewCase::create([
            'student_id' => $validatedData['student_id'],
            'student_name' => $validatedData['student_name'],
            'year' => $validatedData['year'],
            'block' => $validatedData['block'],
            'date_and_time' => $validatedData['date_and_time'],
            'offense' => $validatedData['offense'],
            'description' => $validatedData['description'],
        ]);
        return response()->json($new_cases,201);
    }
}
