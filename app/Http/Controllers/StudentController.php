<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Kelola Profil Siswa";
        $students = Students::all();
        return view('students.index', compact('students', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Profil Siswa";
        return view('students.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone_number' => 'required|max:15',
        ]);

        Students::create($request->all());
        return redirect()->route('listStudents')->with('success', 'Student Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $student)
    {
        $title = "Detail Profil Siswa";
        return view('students.show', compact('student', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $student)
    {
        $title = "Edit Profil Siswa";
        return view('students.edit', compact('student', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Students $student)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone_number' => 'required|max:15',
        ]);

        $student->update($request->all());
        return redirect()->route('listStudents')->with('success', 'Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $student)
    {
        $student->delete();
        return redirect()->route('listStudents')->with('success', 'Student Deleted Successfully');
    }
}
