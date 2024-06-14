<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class StudentLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.loginStudents');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('student')->attempt($credentials)) {
            // Authentication passed, redirect to student dashboard
            return redirect()->intended('/dashboard');
        }
    
        // If authentication fails, redirect back with error message
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    
}