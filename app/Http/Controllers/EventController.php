<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Event;
//use App\Services\GoogleCalendarService;
//use http\Env\Response;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class EventController extends Controller
//{
//    protected $googleService;
//
//    public function __construct(GoogleCalendarService $calendarService)
//    {
//        $this->calendarService = $calendarService;  // Proper injection
//    }
//
//    // Show Google Calendar Events
//    public function showEvents()
//    {
////        $events = $this->calendarService->getEvents(); // Fetch events from Google Calendar
//        return view('events.index');
//    }
//
//    // Store Event in Google Calendar
//    public function storeEvent(Request $request)
//    {
//        $data = $request->all();
//        $data['userID'] = Auth::user()->userID;
//        $eventService = new GoogleCalendarService(\auth()->user());
//        $event = $eventService->create($data);
//        if($event){
//            return response()->json([
//               'success' => true
//            ]);
//        }
//        else{
//            return response()->json([
//               "success" => false
//            ]);
//        }
//
//    }
//
//    // Update Event in Google Calendar
//    public function updateEvent($eventId, Request $request)
//    {
//        $data = [
//            'summary' => $request->title,
//            'description' => $request->description,
//            'start_time' => $request->startDate,
//            'end_time' => $request->endDate
//        ];
//
//        $event = $this->googleService->updateEvent($eventId, $data);
//        return redirect()->route('events.index');
//    }
//
//    // Delete Event from Google Calendar
//    public function deleteEvent($eventId)
//    {
//        $this->googleService->deleteEvent($eventId);
//        return redirect()->route('events.index');
//    }
//}
