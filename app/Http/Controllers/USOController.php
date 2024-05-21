<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class USOController extends Controller
{
    public function dashboard()
    {
        $students = Student::all();
        return view('uso.dashboard', [
            'students' => $students,
        ]);
   
    }
}
