<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
        ]);
    
        $existingEvent = Event::where('title', $request->title)
                             ->where('date', $request->date)
                             ->first();
    
        if ($existingEvent) {
            // Event sudah ada, berikan respons error
            return response()->json(['error' => 'Event already exists'], 422);
        }
    
        $event = Event::create($validatedData);
        return response()->json($event, 201);
    }

    
    
}
