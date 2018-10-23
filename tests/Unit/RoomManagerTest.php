<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomManagerTest extends TestCase
{

    /**
     * @var ConferenceRoomStatus\Services\RoomManager $roomManagerService
     */
    protected $roomManagerService;

    /**
     * TestCase setUp
     */
    public function setUp() {
        parent::setUp();
        $this->roomManagerService = $this->app->make('\ConferenceRoomStatus\Services\RoomManager');
    }

    /**
     * Tests if the Manager can be created
     */
    public function testCanGetRoomManager() {
        $this->assertInstanceOf('\ConferenceRoomStatus\Services\RoomManager', $this->roomManagerService);
    }

    /**
     * Test if the Manager can load all rooms
     *
     * @return void
     */
    public function testCanGetAllRooms() {
        $expected = [
            [
                'ID' => 'room_id_sample_1@justdigital.com.br',
                'NAME' => 'Sample Room 1'
            ],
            [
                'ID' => 'room_id_sample_2@justdigital.com.br',
                'NAME' => 'Sample Room 2'
            ]
        ];

        $rooms = $this->roomManagerService->all();
        
        $this->assertTrue(is_array($rooms));
        $this->assertEquals($expected[0]['ID'], $rooms[0]['ID']);
        $this->assertEquals($expected[0]['NAME'], $rooms[0]['NAME']);
        $this->assertEquals($expected[1]['ID'], $rooms[1]['ID']);
        $this->assertEquals($expected[1]['NAME'], $rooms[1]['NAME']);
    }

    /**
     * Test if the Manager can get a ID By a Room's name
     * 
     * @return void
     */
    public function testCanGetByName() {
        $expectedRoomId = "room_id_sample_1@justdigital.com.br";
        $roomName = "Sample Room 1";

        $roomId = $this->roomManagerService->getByName($roomName);

        $this->assertEquals($expectedRoomId, $roomId);
    }
}
