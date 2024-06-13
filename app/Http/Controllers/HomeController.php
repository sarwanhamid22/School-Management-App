<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Models\Students;
use App\Models\Payments;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'teachers' => Teachers::count(),
            'students' => Students::count(),
            'class' => Students::count(),
            'total_payments' => Payments::sum('amount')
        ];

        return view('dashboard', compact('data'));
    }
}
