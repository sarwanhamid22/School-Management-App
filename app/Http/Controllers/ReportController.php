<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $reports = Report::all();
        return view('report.index', compact('reports'));
    }

    public function create()
    {
        return view('user.reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'report' => 'required',
        ]);

        Report::create([
            'user_id' => Auth::id(),
            'report' => $request->report,
        ]);

        return redirect()->route('reports.create')
                         ->with('success', 'report berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
