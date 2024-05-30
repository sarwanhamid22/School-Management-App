<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Models\TeachingSchedules;

class TeachingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachingSchedules = TeachingSchedules::with('teacher')->get();
        return view('teaching_schedules.index', compact('teachingSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teachers::all();
        return view('teaching_schedules.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'subject' => 'required',
            'teaching_day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        TeachingSchedules::create($request->all());
        return redirect()->route('teaching_schedules.index')->with('success', 'Teaching schedule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeachingSchedules $teachingSchedules)
    {
        return view('teaching_schedules.show', compact('teachingSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeachingSchedules $teachingSchedules)
    {
        $teachers = Teachers::all();
        return view('teaching_schedules.edit', compact('teachingSchedule', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeachingSchedules $teachingSchedule)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'subject' => 'required',
            'teaching_day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $teachingSchedule->update($request->all());
        return redirect()->route('teaching_schedules.index')->with('success', 'Teaching schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeachingSchedules $teachingSchedule)
    {
        $teachingSchedule->delete();
        return redirect()->route('teaching_schedules.index')->with('success', 'Teaching schedule deleted successfully.');
    }
}
