<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            ['eventID' => 1, 'title' => 'Event 1', 'label' => 'Business', 'startDate' => now(), 'endDate' => now(), 'eventUrl' => "", 'location' => "Test Location", 'description' => "Test Description", 'userID' => 1, 'allDay' => 0],
            ['eventID' => 2, 'title' => 'Event 2','label' => 'Holiday', 'startDate' => now(), 'endDate' => now(), 'eventUrl' => "", 'location' => "Test Location", 'description' => "Test Description", 'userID' => 1, 'allDay' => 1],
            ['eventID' => 3, 'title' => 'Event 3','label' => 'ETC', 'startDate' => now(), 'endDate' => now(), 'eventUrl' => "", 'location' => "Test Location", 'description' => "Test Description", 'userID' => 1, 'allDay' => 1],
            ['eventID' => 4, 'title' => 'Event 4','label' => 'Personal', 'startDate' => now(), 'endDate' => now(), 'eventUrl' => "", 'location' => "Test Location", 'description' => "Test Description", 'userID' => 1, 'allDay' => 0],
            ['eventID' => 5, 'title' => 'Event 5','label' => 'family', 'startDate' => now(), 'endDate' => now(), 'eventUrl' => "", 'location' => "Test Location", 'description' => "Test Description", 'userID' => 1, 'allDay' => 0],
        ];

        foreach ($events as $event) {
            DB::table('event')->insert(['eventID' => $event['eventID'],'title' => $event['title'],'label' => $event['label'], 'startDate' => $event['startDate'], 'endDate' => $event['endDate'], 'eventUrl' => $event['eventUrl'], 'location' => $event['location'], 'description' => $event['description'], 'userID' => $event['userID'], 'allDay' => $event['allDay']]);
        }
    }
}
