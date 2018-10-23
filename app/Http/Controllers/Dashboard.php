<?php

namespace ConferenceRoomStatus\Http\Controllers;

use Illuminate\Http\Request;
use ConferenceRoomStatus\Services\Contracts\CalendarServiceInterface;

class Dashboard extends Controller
{

    protected $calendarService;

    public function __construct(CalendarServiceInterface $calendarService) {
        $this->calendarService = $calendarService;
    }
    
    public function index() {
        return $this->calendarService->getDailySchedule();        
    }
}
