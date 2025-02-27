<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'event_date' => 'required|date',
            'registration_start' => 'required|date',
            'registration_end' => 'required|date',
            'time_start' => 'required',
            'time_end' => 'required',
            'participant_estimate' => 'required|integer',
            'location' => 'required|string',
            'city' => 'required|string',
            'detailed_location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        } else {
            $imagePath = null;
        }

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'event_date' => $request->event_date,
            'registration_start' => $request->registration_start,
            'registration_end' => $request->registration_end,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'participant_estimate' => $request->participant_estimate,
            'location' => $request->location,
            'city' => $request->city,
            'detailed_location' => $request->detailed_location,
            'image' => $imagePath,
            'created_by' => $request->user()->id,
        ]);

        return redirect()->route('edit')->with('success', 'Event created successfully!');
    }

    public function update(Request $request, $id)
    {

        $event = Event::find($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        } else {
            $imagePath = $event->image;
        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'event_date' => $request->event_date,
            'registration_start' => $request->registration_start,
            'registration_end' => $request->registration_end,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'participant_estimate' => $request->participant_estimate,
            'location' => $request->location,
            'city' => $request->city,
            'detailed_location' => $request->detailed_location,
            'image' => $imagePath,
        ]);



        return redirect()->route('edit')->with('success', 'Event updated successfully!');
    }

    public function destroy(Request $request)
    {
        $event = Event::find($request->id);
        $event->delete();

        return redirect()->route('edit')->with('success', 'Event deleted successfully!');
    }

    public function index()
    {
        $events = Event::all();

        return response()->json($events);
    }

    public function show(Request $request)
    {
        $event = Event::find($request->id);

        return response()->json($event);
    }
}