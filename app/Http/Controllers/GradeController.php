<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $title = "Kelola Nilai Siswa";
                $grades = Grades::with('student')->get();
                return view('grades.index', compact('grades', 'title'));
            } else if ($usertype == 'guru') {
                $title = "Kelola Nilai Siswa";
                $grades = Grades::with('student')->get();
                return view('teachersview.grades.index', compact('grades', 'title'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $title = "Tambah Nilai Siswa";
                $students = Students::all();
                return view('grades.create', compact('students', 'title'));
            } else if ($usertype == 'guru') {
                $title = "Tambah Nilai Siswa";
                $students = Students::all();
                return view('teachersview.grades.create', compact('students', 'title'));
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $request->validate([
                    'student_id' => 'required|exists:students,id',
                    'subject' => 'required|string',
                    'grade' => 'required|numeric|between:0,100',
                ]);

                Grades::create($request->all());
                return redirect()->route('listGrades')->with('success', 'Grade Recorded Successfully');
            } else if ($usertype == 'guru') {
                $request->validate([
                    'student_id' => 'required|exists:students,id',
                    'subject' => 'required|string',
                    'grade' => 'required|numeric|between:0,100',
                ]);

                Grades::create($request->all());
                return redirect()->route('listGradesview')->with('success', 'Grade Recorded Successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Grades $grade)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $title = "Detail Nilai Siswa";
                return view('grades.show', compact('grade', 'title'));
            } else if ($usertype == 'guru') {
                $title = "Detail Nilai Siswa";
                return view('teachersview.grades.show', compact('grade', 'title'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grades $grade)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $title = "Edit Nilai Siswa";
                $students = Students::all();
                return view('grades.edit', compact('grade', 'students', 'title'));
            } else if ($usertype == 'guru') {
                $title = "Edit Nilai Siswa";
                $students = Students::all();
                return view('teachersview.grades.edit', compact('grade', 'students', 'title'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grades $grade)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $request->validate([
                    'student_id' => 'required|exists:students,id',
                    'subject' => 'required|string',
                    'grade' => 'required|numeric|between:0,100',
                ]);

                $grade->update($request->all());
                return redirect()->route('listGrades')->with('success', 'Grade Updated Successfully');
            } else if ($usertype == 'guru') {
                $request->validate([
                    'student_id' => 'required|exists:students,id',
                    'subject' => 'required|string',
                    'grade' => 'required|numeric|between:0,100',
                ]);

                $grade->update($request->all());
                return redirect()->route('listGradesview')->with('success', 'Grade Updated Successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grades $grade)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $grade->delete();
                return redirect()->route('listGrades')->with('success', 'Grade Deleted Successfully');
            } else if ($usertype == 'guru') {
                $grade->delete();
                return redirect()->route('listGradesview')->with('success', 'Grade Deleted Successfully');
            }
        }
    }

    public function gradestudent()
    {
        $grades = Grades::with('student')->get();
        return view('user.gradestudent', compact('grades'));
    }
}
