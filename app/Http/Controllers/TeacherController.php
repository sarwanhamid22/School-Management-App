<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Imports\TeachersImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TeachingSchedules;
use Illuminate\Support\Facades\File;

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
            'teacher_id' => 'required|unique:teachers',
            'specialization' => 'required',
            'phone_number' => 'required|max:15',
            'address' => 'required',
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
            'teacher_id' => 'required|unique:students,student_id,' . $teacher->id,
            'specialization' => 'required',
            'phone_number' => 'required|max:15',
            'address' => 'required',
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

     /**
     * Import teachers from an Excel file.
     */

     public function importTeachers(Request $request)
     {
         $request->validate([
             'excel_file' => 'required|file|mimes:xlsx,xls',
         ]);
 
         $file = $request->file('excel_file');
 
         // Ensure the directory exists
         $directoryPath = public_path('Teachers_Import_Data');
         if (!file_exists($directoryPath)) {
             mkdir($directoryPath, 0777, true);
         }
 
         // Save the file to the specified folder
         $path = $file->move($directoryPath, $file->getClientOriginalName());
 
         try {
             // Import the file from the storage path
             Excel::import(new TeachersImport, $path);
             return redirect()->route('listTeachers')->with('success', 'Data Is Imported Successfully');
         } catch (\Exception $e) {
             // Log the error for debugging
             Log::error('Import Error: ' . $e->getMessage());
             Log::error('File Path: ' . $path);
             return redirect()->route('listTeachers')->with('error', 'An Error Occurred While Importing Data');
         }
     }

}
