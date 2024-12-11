<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\GoogleCalendarService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    private $calendarService;

    public function __construct(GoogleCalendarService $calendarService)
    {
        $this->calendarService = $calendarService;
    }
    public function index()
    {
        return view('events.index');
    }

    public function fetchEvents(Request $request)
    {
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
        // Fetch the local event by ID
        $localEvent = Event::findOrFail($request->id);
        $eventData = $request->only(['title', 'location', 'description', 'start', 'end']);

        try {
            $calendarId = 'b5a8fa334f432678b567d65599ee6b835226a934b785529c3afb62ca9d89e6b0@group.calendar.google.com'; // Or your specific calendar ID

            // Step 1: Fetch the existing Google Calendar event using the stored `google_event_id`
            $googleEventID = $localEvent->googleEventID;

            // Step 3: Save the updated event to Google Calendar
            $updatedEvent = $this->calendarService->updateEvent($calendarId, $googleEventID, $eventData);

            // Step 4: Update the local database
            $event = Event::where('eventID', $request->id)->update([
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

            return response()->json([
                'message' => 'Event updated successfully',
                'Googel Events Updated' => $updatedEvent,
                'Local Events Update' => $event,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update event', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $eventData = [
            'summary' => $request->input('title'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
            'start' => $request->input('startDate'),
            'end' => $request->input('endDate'),
            'allDay' => $request->input('allDay'),
            'eventUrl' => $request->input('eventUrl'),
            'label' => $request->input('label'),
        ];

        // Call the service method to create event in both Google Calendar and local database
        $result = $this->calendarService->createEvent($eventData);

        if (isset($result['error'])) {
            return response()->json(['message' => $result['error']], 500);
        }

        return response()->json([
            'message' => $result['message'],
            'googleEvent' => $result['google_event'],
            'localEvent' => $result['local_event'],
        ], 201);
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
        try {
            // Assuming $calendarId is 'primary' or a specific calendar ID
            $calendarId = 'b5a8fa334f432678b567d65599ee6b835226a934b785529c3afb62ca9d89e6b0@group.calendar.google.com';
            $result = $this->calendarService->deleteEvent($calendarId, $request->id);

            return response()->json(['message' => $result['message']], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete event', 'error' => $e->getMessage()], 500);
        }
    }

}
