<?php

namespace App\Services;
use App\Models\Event;
use Google\Client;
use Google\Service\Calendar;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Illuminate\Http\Request;

class GoogleCalendarService
{
    protected $service;

    public function __construct()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google-calendar/google.json'));
        $client->addScope(Calendar::CALENDAR);
        $client->setAccessType('offline');

        $this->service = new Calendar($client);
    }

    public function listEvents($calendarId = 'primary')
    {
        $events = $this->service->events->listEvents($calendarId);
        return $events->getItems();
    }

    public function createEvent($calendarId = 'primary', $eventData)
    {
        $event = new Calendar\Event($eventData);
        return $this->service->events->insert($calendarId, $event);
    }

    public function updateEvent($calendarId = 'primary', $eventId, $eventData)
    {
        $event = $this->service->events->get($calendarId, $eventId);
        foreach ($eventData as $key => $value) {
            $event[$key] = $value;
        }
        return $this->service->events->update($calendarId, $eventId, $event);
    }

    public function deleteEvent($calendarId = 'primary', $eventId)
    {
        return $this->service->events->delete($calendarId, $eventId);
    }

    public function fetchGoogleEvents(GoogleCalendarService $googleCalendar)
    {
        $events = $googleCalendar->listEvents();
        return response()->json($events);
    }

    use App\Services\GoogleCalendarService;

    public function createGoogleEvent(Request $request, GoogleCalendarService $googleCalendar)
    {
        $eventData = [
            'summary' => $request->title,
            'start' => ['dateTime' => $request->start],
            'end' => ['dateTime' => $request->end],
            'description' => $request->description,
        ];

        $googleCalendar->createEvent('primary', $eventData);
        return response()->json(['message' => 'Event created in Google Calendar.']);
    }

    public function updateGoogleEvent(Request $request, GoogleCalendarService $googleCalendar)
    {
        $eventData = [
            'summary' => $request->title,
            'start' => ['dateTime' => $request->start],
            'end' => ['dateTime' => $request->end],
            'description' => $request->description,
        ];

        $googleCalendar->updateEvent('primary', $request->google_event_id, $eventData);
        return response()->json(['message' => 'Google Calendar event updated.']);
    }

    public function deleteGoogleEvent(Request $request, GoogleCalendarService $googleCalendar)
    {
        $googleCalendar->deleteEvent('primary', $request->google_event_id);
        return response()->json(['message' => 'Event deleted from Google Calendar.']);
    }
}
