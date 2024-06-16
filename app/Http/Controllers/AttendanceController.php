<?php

namespace App\Http\Controllers;

use App\Models\Attendances;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $title = "Kelola Kehadiran Siswa";
                $attendances = Attendances::with('student')->get();
                return view('attendances.index', compact('attendances', 'title'));
            } else if ($usertype == 'guru') {
                $title = "Kelola Kehadiran Siswa";
                $attendances = Attendances::with('student')->get();
                return view('teachersview.attendances.index', compact('attendances', 'title'));
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
                $title = "Tambah Kehadiran Siswa";
                $students = Students::all();
                return view('attendances.create', compact('students', 'title'));
            } else if ($usertype == 'guru') {
                $title = "Tambah Kehadiran Siswa";
                $students = Students::all();
                return view('teachersview.attendances.create', compact('students', 'title'));
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
                    'date' => 'required|date',
                    'status' => 'required|in:Present,Absent,Late,Excused',
                ]);

                Attendances::create($request->all());
                return redirect()->route('listAttendances')->with('success', 'Attendance Recorded Successfully');
            } else if ($usertype == 'guru') {
                $request->validate([
                    'student_id' => 'required|exists:students,id',
                    'date' => 'required|date',
                    'status' => 'required|in:Present,Absent,Late,Excused',
                ]);

                Attendances::create($request->all());
                return redirect()->route('listAttendancesview')->with('success', 'Attendance Recorded Successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendances $attendance)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $title = "Detail Kehadiran Siswa";
                return view('attendances.show', compact('attendance', 'title'));
            } else if ($usertype == 'guru') {
                $title = "Detail Kehadiran Siswa";
                return view('teachersview.attendances.show', compact('attendance', 'title'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendances $attendance)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $title = "Edit Kehadiran Siswa";
                $students = Students::all();
                return view('attendances.edit', compact('attendance', 'students', 'title'));
            } else if ($usertype == 'guru') {
                $title = "Edit Kehadiran Siswa";
                $students = Students::all();
                return view('teachersview.attendances.edit', compact('attendance', 'students', 'title'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendances $attendance)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $request->validate([
                    'student_id' => 'required|exists:students,id',
                    'date' => 'required|date',
                    'status' => 'required|in:Present,Absent,Late,Excused',
                ]);
        
                $attendance->update($request->all());
                return redirect()->route('listAttendances')->with('success', 'Attendance Updated Successfully');
            } else if ($usertype == 'guru') {
                $request->validate([
                    'student_id' => 'required|exists:students,id',
                    'date' => 'required|date',
                    'status' => 'required|in:Present,Absent,Late,Excused',
                ]);
        
                $attendance->update($request->all());
                return redirect()->route('listAttendancesview')->with('success', 'Attendance Updated Successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendances $attendance)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            if ($usertype == 'admin') {
                $attendance->delete();
                return redirect()->route('listAttendances')->with('success', 'Attendance deleted successfully');
            } else if ($usertype == 'guru') {
                $attendance->delete();
                return redirect()->route('listAttendancesview')->with('success', 'Attendance deleted successfully');
            }
        }
    }

    public function attendancesstudent()
    {
        $attendances = Attendances::with('student')->get();
        return view('user.attendancesstudent', compact('attendances'));
    }
}
