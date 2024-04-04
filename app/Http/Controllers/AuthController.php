<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
        
        if (Auth::check()) {
            if(Auth::user()->user_type == 1){
                return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type == 2){
                return redirect('staff/dashboard');
            }
            else if(Auth::user()->user_type == 3){
                return redirect('odean/dashboard');
            }
            else if(Auth::user()->user_type == 4){
                return redirect('chair/dashboard');
            }
            else if(Auth::user()->user_type == 5){
                return redirect('cdean/dashboard');
            }
        
        }
        else{
            return view('auth.login');
        }

        return view('auth.login');
    }

    public function Authlogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            
            if(Auth::user()->user_type == 1){
                return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type == 2){
                return redirect('staff/dashboard');
            }
            else if(Auth::user()->user_type == 3){
                return redirect('odean/dashboard');
            }
            else if(Auth::user()->user_type == 4){
                return redirect('chair/dashboard');
            }
            else if(Auth::user()->user_type == 5){
                return redirect('cdean/dashboard');
            }
        
        }
        else
        {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}