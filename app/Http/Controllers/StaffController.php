<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Employee;
use App\Models\Violation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class StaffController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::user()->id;
        $employees = Employee::where('id', $userId)->get();

        return view('staff.dashboard', [
            'employees' => $employees,
        ]);
    }
}
