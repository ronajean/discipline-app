<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CDeanController extends Controller
{
    public function dashboard()
    {
        // Fetch data related to the student from the database
        // For example, you might fetch the student's courses, grades, etc.

        // Then, pass the data to the view
        return view('cdean.dashboard', [
            // 'courses' => $courses,
            // 'grades' => $grades,
            // etc.
        ]);
    }

    public function fileComplaint()
    {
        return view('cdean.complaint-report', [
            // 'courses' => $courses,
            // 'grades' => $grades,
            // etc.
        ]);
    }
}
