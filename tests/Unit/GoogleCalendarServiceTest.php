<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GoogleCalendarServiceTest extends TestCase
{

    /**
     * 
     */
    protected $calendarService;

    /**
     * TestCase setUp
     */
    public function setUp() {
        parent::setUp();
        $this->calendarService = $this->app->make('\ConferenceRoomStatus\Services\GoogleCalendar');
    }

    /**
     * Test if the service can get a Daily Schedule
     *
     * @return void
     */
    public function testCanGetDailySchedule()
    {        
        $response = $this->calendarService->getDailySchedule();
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
