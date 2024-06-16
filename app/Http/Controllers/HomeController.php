<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'siswa') {
                return view('user.master');
            } elseif ($usertype == 'admin') {
                return view('layouts.master');
            } elseif ($usertype == 'guru') {
                return view('teachersview.master');
            } else {
                return redirect()->back();
            }
        }
        return view('home');
    }
}
