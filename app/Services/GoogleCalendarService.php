<?php

namespace App\Services;

use App\Models\Event;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Support\Facades\Auth;

class GoogleCalendarService
{
//    protected $client;
//    protected $service;
//
//    public function __construct()
//    {
//        $this->client = $this->getClient();
//        $this->service = new Google_Service_Calendar($this->client);
//    }
//
//    private function getClient()
//    {
//        $client = new Google_Client();
//        $client->setApplicationName('Google Calendar API PHP');
//        $client->setScopes(Google_Service_Calendar::CALENDAR);
//        $client->setAuthConfig(storage_path('app/google-calendar-credentials.json'));
//        $client->setRedirectUri(route('oauth.callback'));
//        $client->setAccessType('offline'); // Ensures refresh token is generated
//        $client->setPrompt('consent');     // Forces consent screen to show
//
//        $tokenPath = storage_path('app/token.json');
//
//        if (file_exists($tokenPath)) {
//            $accessToken = json_decode(file_get_contents($tokenPath), true);
//            $client->setAccessToken($accessToken);
//        }
//
//        // If no token exists or the token is expired, prompt for new authentication
//        if ($client->isAccessTokenExpired()) {
//            if ($client->getRefreshToken()) {
//                // Use refresh token to get a new access token
//                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
//                file_put_contents($tokenPath, json_encode($client->getAccessToken()));
//            } else {
//                // No refresh token available, start the OAuth flow
//                $authUrl = $client->createAuthUrl();
//                header('Location: ' . $authUrl);
//                exit;
//            }
//        }
//
//        return $client;
//    }
//
//
//    public function getService()
//    {
//        return new Google_Service_Calendar($this->client);
//    }
//    public function createEvent($eventData)
//    {
//        try {
//            // Step 1: Create Event in Google Calendar
//            $googleEvent = new \Google_Service_Calendar_Event([
//                'summary' => $eventData['summary'],
//                'location' => $eventData['location'],
//                'description' => $eventData['description'],
//                'start' => [
//                    'dateTime' => "2024-06-10T10:00:00",
//                    'timeZone' => 'Asia/Karachi', // Adjust time zone as needed
//                ],
//                'end' => [
//                    'dateTime' => "2024-06-10T10:00:00",
//                    'timeZone' => 'Asia/Karachi', // Adjust time zone as needed
//                ],
//                'conferenceData' => [
//                    'createRequest' => [
//                        'requestId' => 'randomString'.time()
//                    ]
//                ]
//            ]);
//            // Insert the event into Google Calendar
//            $result = $this->service->events->insert('b5a8fa334f432678b567d65599ee6b835226a934b785529c3afb62ca9d89e6b0@group.calendar.google.com', $googleEvent);
//
//            // Step 2: Save Event in Local Database
//            $event = new Event([
//                'googleEventID' => $result->getId(), // Save Google Calendar event ID
//                'title' => $eventData['summary'],
//                'location' => $eventData['location'],
//                'description' => $eventData['description'],
//                'startDate' => $eventData['start'],
//                'endDate' => $eventData['end'],
//                'label' => $eventData['label'],
//                'eventUrl' => $eventData['eventUrl'],
//                'allDay' => $eventData['allDay'] ?? 0,
//                'userID' => Auth::user()->userID,
//            ]);
//
//            // Save the event to the local database
//            $event->save();
//
//            return [
//                'message' => 'Event created successfully in Google Calendar and local database',
//                'google_event' => $result,
//                'local_event' => $event,
//            ];
//
//        } catch (\Exception $e) {
//            return ['error' => 'Failed to create event: ' . $e->getMessage()];
//        }
//    }
//
//    public function listEvents($calendarId = 'primary')
//    {
//        $events = $this->service->events->listEvents($calendarId);
//        return $events->getItems();
//    }
//
//
//    public function updateEvent($calendarId, $eventId, $eventData)
//    {
//        try {
//            // Step 1: Fetch the existing event from Google Calendar
//            $event = $this->service->events->get($calendarId, $eventId);
//
//            // Step 2: Manually apply the updates to the event
//            if (isset($eventData['title'])) {
//                $event->setSummary($eventData['title']);
//            }
//
//            if (isset($eventData['location'])) {
//                $event->setLocation($eventData['location']);
//            }
//
//            if (isset($eventData['description'])) {
//                $event->setDescription($eventData['description']);
//            }
//
//            // Update start time if provided
//            if (isset($eventData['start']) && is_array($eventData['start'])) {
//                $start = new \Google_Service_Calendar_EventDateTime();
//                $start->setDateTime($eventData['start']['dateTime']);
//                $start->setTimeZone($eventData['start']['timeZone']);
//                $event->setStart($start);
//            }
//
//            // Update end time if provided
//            if (isset($eventData['end']) && is_array($eventData['end'])) {
//                $end = new \Google_Service_Calendar_EventDateTime();
//                $end->setDateTime($eventData['end']['dateTime']);
//                $end->setTimeZone($eventData['end']['timeZone']);
//                $event->setEnd($end);
//            }
//
//            // Step 3: Ensure we are passing a Google_Service_Calendar_Event object to the update method
//            if (!$event instanceof \Google_Service_Calendar_Event) {
//                throw new \Exception("The event is not an instance of Google_Service_Calendar_Event.");
//            }
//
//            // Step 4: Update the event
//            $updatedEvent = $this->service->events->update($calendarId, $eventId, $event);
//
//            return $updatedEvent;
//        } catch (\Exception $e) {
//            throw new \Exception('Failed to update event: ' . $e->getMessage());
//        }
//    }
//
//    public function deleteEvent($calendarId, $eventID)
//    {
//        try {
//            // Step 1: Delete from Google Calendar
//            $event = Event::where('eventID', $eventID)->first();
//            $googleEventID = $event->googleEventID;
//            $this->service->events->delete($calendarId, $googleEventID);
//
//            // Step 2: Delete from Local Database
//            // Assuming you have an Event model where events are stored in a 'events' table
//
//            if ($event) {
//                // If the event exists in the local database, delete it
//                $event->delete();
//            } else {
//                // Handle case where event is not found in the local database
//                throw new \Exception('Event not found in local database.');
//            }
//
//            return ['message' => 'Event deleted successfully from both Google Calendar and local database'];
//        } catch (\Exception $e) {
//            // Handle any exceptions during the process
//            throw new \Exception('Failed to delete event: ' . $e->getMessage());
//        }
//    }
}
