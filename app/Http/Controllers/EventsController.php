<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{

    public function index()
    {
        return view('events.index');
    }

    public function fetchEvents(Request $request)
    {
        // Fetch events from database or another source
        $events = Event::all(); // Example, replace with actual event fetching logic
        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->eventID,           // Unique ID for the event
                'title' => $event->title,          // Event title
                'url' => $event->eventUrl ?? "",         // Event Url for the event
                'start' => $event->startDate,      // Start date/time
                'end' => $event->endDate,          // End date/time
                'allDay' => $event->allDay,        // Boolean for all-day events
                'extendedProps' => [               // Additional custom fields
                    'calendar' => $event->label ?? "",
                    'location' => $event->location ?? "",
                    'description' => $event->description ?? "",
                ],
            ];
        });
        return response()->json($formattedEvents);  // Return as JSON
    }

    public function create(Request $request)
    {
//        dd($request->all());
        $updatedEvents = Event::where('eventID', $request->id)->update([
            'title' => $request->title ?? "",
            'label' => $request->label ?? "",
            'startDate' => $request->start ?? "" ,
            'endDate' => $request->end ?? "",
            'allDay' => $request->allDay === "true" ? 1 : 0,
            'eventUrl' => $request->eventUrl ?? "",
            'location' => $request->location ?? "",
            'description' => $request->description ?? "",
            'userID' => Auth::user()->userID
        ]);

        return response()->json([
            "Status" => true,
            "Message" => "Event Updated Successfully ..!!",
            "Response" => $updatedEvents
        ]);
    }

    public function store(Request $request)
    {
        $events = Event::create([
            'title' => $request->title ?? "",
            'label' => $request->label ?? "",
            'startDate' => $request->start ?? "" ,
            'endDate' => $request->end ?? "",
            'allDay' => $request->allDay === "true" ? 1 : 0,
            'eventUrl' => $request->eventUrl ?? "",
            'location' => $request->location ?? "",
            'description' => $request->description ?? "",
            'userID' => Auth::user()->userID
        ]);

        return response()->json([
            "Status" => true,
            "Message" => "Event Added Successfully ..!!",
            "Response" => $events
        ]);

    }

    public function show(Event $events)
    {
        //
    }


    public function edit(Event $events)
    {
        //
    }


    public function update(Request $request, Event $event)
    {
        dd($request->all(), $event);
    }

    public function delete(Request $request)
    {
        $events = Event::destroy($request->id);
        return response()->json([
            "Status" => true,
            "Message" => "Event Deleted Successfully ..!!",
            "Response" => $events
        ]);
    }

}
