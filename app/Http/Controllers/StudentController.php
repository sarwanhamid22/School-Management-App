<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Kelola Profil Siswa";
        $students = Students::all();
        return view('students.index', compact('students', 'title'));
    }

    public function create()
    {
        $title = "Tambah Profil Siswa";
        return view('students.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'student_id' => 'required|unique:students',
            'class' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone_number' => 'required|max:15',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:8',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoName = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/photos', $photoName);
        }

        try {
            Students::create([
                'name' => $request->name,
                'student_id' => $request->student_id,
                'class' => $request->class,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $photoName,
            ]);

            return redirect()->route('listStudents')->with('success', 'Student Created Successfully');
        } catch (\Exception $e) {
            Log::error('Create Error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['msg' => 'Failed to create student. Please check the logs for more details.']);
        }
    }

    public function show(Students $student)
    {
        $title = "Detail Profil Siswa";
        return view('students.show', compact('student', 'title'));
    }

    public function edit(Students $student)
    {
        $title = "Edit Profil Siswa";
        return view('students.edit', compact('student', 'title'));
    }

    public function update(Request $request, Students $student)
    {
        $request->validate([
            'name' => 'required',
            'student_id' => 'required|unique:students,student_id,' . $student->id,
            'class' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone_number' => 'required|max:15',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'password' => 'nullable|min:8',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoName = $student->photo;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/photos', $photoName);
        }

        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $student->update($data + ['photo' => $photoName]);

        return redirect()->route('listStudents')->with('success', 'Student Updated Successfully');
    }

    public function destroy(Students $student)
    {
        $student->delete();
        return redirect()->route('listStudents')->with('success', 'Student Deleted Successfully');
    }

    public function importStudents(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');

        $directoryPath = public_path('Students_Import_Data');
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        $path = $file->move($directoryPath, $file->getClientOriginalName());

        try {
            Excel::import(new StudentsImport, $path);
            return redirect()->route('listStudents')->with('success', 'Data Is Imported Successfully');
        } catch (\Exception $e) {
            Log::error('Import Error: ' . $e->getMessage());
            Log::error('File Path: ' . $path);
            return redirect()->route('listStudents')->with('error', 'An Error Occurred While Importing Data');
        }
    }
}