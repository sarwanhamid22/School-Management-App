<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Models\TeachingSchedules;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Kelola Profil Guru";
        $teachers = Teachers::all();
        return view('teachers.index', compact('teachers', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Profil Guru";
        return view('teachers.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            'phone_number' => 'required|max:15',
            'email' => 'required|email|unique:teachers,email',
        ]);

        Teachers::create($request->all());
        return redirect()->route('listTeachers')->with('success', 'Teacher Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teachers $teacher)
    {
        $title = "Detail Profil Guru";
        return view('teachers.show', compact('teacher', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teachers $teacher)
    {
        $title = "Edit Profil Guru";
        return view('teachers.edit', compact('teacher', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teachers $teacher)
    {
        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            'phone_number' => 'required|max:15',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
        ]);

        $teacher->update($request->all());
        return redirect()->route('listTeachers')->with('success', 'Teacher Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teachers $teacher)
    {
         // Delete related teaching schedules
        TeachingSchedules::where('teacher_id', $teacher->id)->delete();
        $teacher->delete();
        return redirect()->route('listTeachers')->with('success', 'Teacher Deleted Successfully');
    }
}
