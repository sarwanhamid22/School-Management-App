<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $title = "SMK Gamelab Indonesia"; // Judul halaman dinamis
        return view('landingpage', compact('title'));
    }
}
