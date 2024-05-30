<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\Students;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grades::with('student')->get();
        return view('grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Students::all();
        return view('grades.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject' => 'required',
            'grade' => 'required|numeric|between:0,100',
        ]);

        Grades::create($request->all());
        return redirect()->route('grades.index')->with('success', 'Grade recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grades $grades)
    {
        return view('grades.show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grades $grades)
    {
        $students = Students::all();
        return view('grades.edit', compact('grade', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grades $grade)
    {
         $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject' => 'required',
            'grade' => 'required|numeric|between:0,100',
        ]);

        $grade->update($request->all());
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grades $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }
}
