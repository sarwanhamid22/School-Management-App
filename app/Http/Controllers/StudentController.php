<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

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
            'student_id' => 'required|unique:students',
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
            'student_id' => 'required|unique:students,student_id,' . $student->id,
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

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');

        try {
            Excel::import(new StudentsImport, $file);
            return redirect()->route('listStudents')->with('success', 'Data berhasil diimpor.');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Import Error: ' . $e->getMessage());
            Log::error('File Path: ' . $file->getPathname());
            return redirect()->route('listStudents')->with('error', 'Terjadi kesalahan saat mengimpor data.');
        }
    }
}
