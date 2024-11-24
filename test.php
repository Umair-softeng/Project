<?php

require 'vendor/autoload.php';

use Google\Client;
use Google\Service\Calendar;

try {
    // Initialize Google Client
    $client = new Client();
    $client->setAuthConfig(__DIR__ . '/storage/app/google-calendar-credentials.json'); // Adjust the path if needed
    $client->addScope(Calendar::CALENDAR);

    // Initialize Calendar Service
    $service = new Calendar($client);

    // Set the Calendar ID
    $calendarId = 'primary'; // Use 'primary' for the default calendar

    // Fetch Events
    $events = $service->events->listEvents($calendarId);

    // Print Events
//    echo "Upcoming Events:\n";
//    foreach ($events->getItems() as $event) {
//        $start = $event->getStart()->getDateTime() ?: $event->getStart()->getDate();
//        echo "{$event->getSummary()} (Start: {$start})\n";
//    }
    $event = new \Google\Service\Calendar\Event([
        'summary' => 'Test Event',  // Event title
        'start' => [
            'dateTime' => '2024-11-23T10:00:00-07:00',  // Start time (ISO format with timezone)
            'timeZone' => 'America/Los_Angeles',        // Specify timezone
        ],
        'end' => [
            'dateTime' => '2024-11-23T11:00:00-07:00',  // End time (ISO format with timezone)
            'timeZone' => 'America/Los_Angeles',        // Specify timezone
        ],
    ]);

// Create the event
    $calendarId = 'primary';  // Use 'primary' for the default calendar
    $service->events->insert($calendarId, $event);

    echo "Event created: " . $event->htmlLink;

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
