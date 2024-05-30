<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Attendances;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendances::with('student')->get();
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Students::all();
        return view('attendances.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'attendance_date' => 'required|date',
            'attendance_status' => 'required|in:present,absent,late',
        ]);

        Attendances::create($request->all());
        return redirect()->route('attendances.index')->with('success', 'Attendance recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendances $attendances)
    {
        return view('attendances.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendances $attendances)
    {
        $students = Students::all();
        return view('attendances.edit', compact('attendance', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendances $attendance)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'attendance_date' => 'required|date',
            'attendance_status' => 'required|in:present,absent,late',
        ]);

        $attendance->update($request->all());
        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendances $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance deleted successfully.');
    }
}
