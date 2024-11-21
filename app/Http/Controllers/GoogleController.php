<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Calendar;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        $client = new Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->addScope('https://www.googleapis.com/auth/calendar');

        return redirect($client->createAuthUrl());
    }

    public function handleGoogleCallback(Request $request)
    {
        $client = new Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->authenticate($request->get('code'));

        session(['google_token' => $client->getAccessToken()]);

        return redirect('/event');
    }

    public function listEvents()
    {
        $client = new Client();
        $client->setAccessToken(session('google_token'));

        if ($client->isAccessTokenExpired()) {
            // Handle token refresh logic
        }

        $service = new Calendar($client);
        $calendarId = 'primary'; // Or a specific calendar ID
        $events = $service->events->listEvents($calendarId);

        return view('calendar', ['events' => $events]);
    }

    //Create Event
    public function createEvent()
    {
        $client = new \Google\Client();
        $client->setAccessToken(session('google_token'));

        $service = new \Google\Service\Calendar($client);
        $calendarId = 'primary'; // Or a specific calendar ID

        $event = new Event([
            'summary' => 'New Event',
            'location' => 'Online',
            'description' => 'A new event created from Laravel.',
            'start' => ['dateTime' => '2024-11-25T10:00:00-07:00'],
            'end' => ['dateTime' => '2024-11-25T11:00:00-07:00'],
        ]);

        $createdEvent = $service->events->insert($calendarId, $event);

        return response()->json(['message' => 'Event created', 'event' => $createdEvent]);
    }

    //Update Event
    public function updateEvent($eventId)
    {
        $client = new \Google\Client();
        $client->setAccessToken(session('google_token'));

        $service = new \Google\Service\Calendar($client);
        $calendarId = 'primary'; // Or a specific calendar ID

        $event = $service->events->get($calendarId, $eventId);
        $event->setSummary('Updated Event Title');
        $event->setDescription('Updated Event Description');

        $updatedEvent = $service->events->update($calendarId, $eventId, $event);

        return response()->json(['message' => 'Event updated', 'event' => $updatedEvent]);
    }

    //Delete Event 
    public function deleteEvent($eventId)
    {
        $client = new \Google\Client();
        $client->setAccessToken(session('google_token'));

        $service = new \Google\Service\Calendar($client);
        $calendarId = 'primary'; // Or a specific calendar ID

        $service->events->delete($calendarId, $eventId);

        return response()->json(['message' => 'Event deleted']);
    }
}
