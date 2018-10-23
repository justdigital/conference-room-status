<?php

namespace ConferenceRoomStatus\Services;

use Carbon\Carbon as Carbon;
use Spatie\GoogleCalendar\Event;
use ConferenceRoomStatus\Services\Contracts\CalendarServiceInterface;

class GoogleCalendar implements CalendarServiceInterface {

    /**
     * @var Spatie\GoogleCalendar\Event $event
     */
    protected $event;

    /**
     * Google Calendar Service Constructor
     * 
     * @param Spatie\GoogleCalendar\Event $event
     */
    public function __construct(Event $event) {
        $this->event = $event;
    }

    /**
     * Get the daily Schedule of a Calendar
     * 
     * @param string|null $calendarId
     * 
     * @return array
     */
    public function getDailySchedule($calendarID = null) {
        if (is_null($calendarID)) {
            $calendarID = env('GOOGLE_CALENDAR_ID');
        }
        
        $startDate = Carbon::today();
        $endDate = Carbon::tomorrow();
        $params = [];
        
        return $this->event->get($startDate, $endDate, $params, $calendarID);
    }
}