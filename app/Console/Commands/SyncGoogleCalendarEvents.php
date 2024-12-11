<?php
//
//namespace App\Console\Commands;
//
//use App\Models\Event;
//use App\Services\GoogleCalendarService;
//use Carbon\Carbon;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Log;
//use Illuminate\Console\Command;
//
//class SyncGoogleCalendarEvents extends Command
//{
//    protected $googleService;
//    protected $signature = 'calendar:sync';
//
//    // The console command description.
//    protected $description = 'Sync events from Google Calendar to the local database';
//
//    // The Google Client instance
//    protected $client;
//    protected $service;
//
//    // Create a new command instance.
//    public function __construct(GoogleCalendarService $googleService)
//    {
//        parent::__construct();
//        $this->googleService = $googleService; // Make sure this is set properly
//    }
//
//    // Execute the console command.
//    public function handle()
//    {
//        try {
//            $this->info('Sync started at ' . now());
//
//            // Check if the Google Calendar service is correctly initialized
//            $service = $this->googleService->getService();
//            if (!$service) {
//                $this->error('Google Calendar service is not initialized.');
//                Log::error('Google Calendar service is not initialized.');
//                return;
//            }
//
//            $this->info('Google Calendar service initialized.');
//
//            // Fetch events from Google Calendar
//            $calendarId = 'b5a8fa334f432678b567d65599ee6b835226a934b785529c3afb62ca9d89e6b0@group.calendar.google.com'; // Use your actual calendar ID
//            $optParams = [
//                'maxResults' => 10,
//                'orderBy' => 'startTime',
//                'singleEvents' => true,
//                'timeMin' => Carbon::now()->subMonths(1)->toIso8601String(),
//            ];
//
//            // Fetch events
//            $events = $service->events->listEvents($calendarId, $optParams);
//            Log::info('Raw Google Calendar Response: ' . json_encode($events));
//
//            // Check if events were found
//            if (count($events->getItems()) === 0) {
//                Log::info('No events found in the calendar.');
//            }
//            $this->info('Fetched ' . count($events->getItems()) . ' events.');
//
//            Log::info('Fetched events: ' . json_encode($events));
//
//            // Process each event and save to DB
//            foreach ($events->getItems() as $eventData) {
//                DB::beginTransaction();
//                try {
//                    // Save event to database
//                    Event::updateOrCreate(
//                        ['googleEventID' => $eventData->getId()],
//                        [
//                            'title' => $eventData->getSummary(),
//                            'startDate' => Carbon::parse($eventData->getStart()->getDateTime())->setTimezone('UTC'),
//                            'endDate' => Carbon::parse($eventData->getEnd()->getDateTime())->setTimezone('UTC'),
//                            'label' => 'Business',
//                            'location' => $eventData->getLocation(),
//                            'description' => $eventData->getDescription(),
//                            'userID' => 1,
//                        ]
//                    );
//                    DB::commit();
//                } catch (\Exception $e) {
//                    DB::rollBack();
//                    Log::error('Error saving event to DB: ' . $e->getMessage());
//                    $this->error('Error saving event to DB: ' . $e->getMessage());
//                }
//            }
//
//            $this->info('Sync completed at ' . now());
//        } catch (\Exception $e) {
//            Log::error('General Error: ' . $e->getMessage());
//            $this->error('Error: ' . $e->getMessage());
//        }
//    }
//}
