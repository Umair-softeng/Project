<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
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
        $googleEventData = [
            'summary' => $request->title ?? "Untitled Event",
            'location' => $request->location ?? "",
            'description' => $request->description ?? "",
            'start' => [
                'dateTime' => Carbon::parse($request->start)->toRfc3339String(), // Proper date format
                'timeZone' => 'UTC', // Adjust if needed
            ],
            'end' => [
                'dateTime' => Carbon::parse($request->end)->toRfc3339String(),
                'timeZone' => 'UTC',
            ],
        ];

        $calendarId = 'b5a8fa334f432678b567d65599ee6b835226a934b785529c3afb62ca9d89e6b0@group.calendar.google.com';

        try {
            // Call the service method to create the event
            $googleEvent = $calendarService->createEvent($calendarId, $googleEventData);

            // Retrieve the Google Event ID
            $googleEventID = $googleEvent->id;

            // Save to the database
            $event = Event::create([
                'title' => $request->title ?? "",
                'label' => $request->label ?? "",
                'startDate' => $request->start ?? "",
                'endDate' => $request->end ?? "",
                'allDay' => $request->allDay === "true" ? 1 : 0,
                'eventUrl' => $request->eventUrl ?? "",
                'location' => $request->location ?? "",
                'description' => $request->description ?? "",
                'userID' => Auth::user()->userID,
                'googleEventID' => $googleEventID, // Save Google Event ID
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "Status" => false,
                "Message" => "Failed to sync event with Google Calendar.",
                "Error" => $e->getMessage(), // Error message for debugging
            ], 500);
        }

        // Respond with success
        return response()->json([
            "Status" => true,
            "Message" => "Event Added and Synced Successfully ..!!",
            "Response" => $event,
            "GoogleEventID" => $googleEventID,
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
