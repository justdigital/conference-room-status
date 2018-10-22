<?php

namespace ConferenceRoomStatus\Http\Controllers;

use Illuminate\Http\Request;
use ConferenceRoomStatus\Services\GoogleCalendar;

class Dashboard extends Controller
{

    protected $calendarService;

    public function __construct(GoogleCalendar $calendarService) {
        $this->calendarService = $calendarService;
    }
    
    public function index() {
        return $this->calendarService->getDailySchedule();        
    }
}
