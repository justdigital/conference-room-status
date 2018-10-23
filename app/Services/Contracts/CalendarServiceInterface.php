<?php

namespace ConferenceRoomStatus\Services\Contracts;

interface CalendarServiceInterface {

    /**
     * Get the daily Schedule of a Calendar
     * 
     * @param string|null $calendarId
     * 
     * @return array
     */    
    public function getDailySchedule($calendarID = null);

}