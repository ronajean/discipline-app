<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class USOController extends Controller
{
    public function dashboard()
    {
        return view('uso.dashboard');
    }
}
