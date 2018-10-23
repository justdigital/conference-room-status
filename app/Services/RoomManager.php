<?php

namespace ConferenceRoomStatus\Services;

use ConferenceRoomStatus\Services\Contracts\RoomManagerInterface;

class RoomManager implements RoomManagerInterface {

    /**
     * @var array $rooms
     */
    protected $rooms;

    /**
     * RoomManager constructor
     * 
     * @return void
     */
    public function __construct() {
        $roomVariables = array_filter($_ENV, function($key) {
            return starts_with($key, 'ROOM_');
        }, ARRAY_FILTER_USE_KEY);
        
        $this->loadRoomArray($roomVariables);
    }

    /**
     * Loads the $rooms variable. Turns a sequence of strings into
     * correlated arrays using the env var index (E.g.: _1).
     * 
     * @return void
     */
    private function loadRoomArray(array $roomVariables) {
        foreach ($roomVariables as $key => $roomVar) {
            $xplodedKey = explode('_', $key);
            $identifier = end($xplodedKey);
            if (str_contains($key, 'NAME')) {
                $this->rooms[$identifier]['NAME'] = $roomVar;
            }
            if (str_contains($key, 'ID')) {
                $this->rooms[$identifier]['ID'] = $roomVar;
            }
        }
        $this->rooms = array_values($this->rooms);
    }

    /**
     * Get all loaded rooms
     * 
     * @return array
     */
    public function all() : array {
        return $this->rooms;
    }

    /**
     * Get a Room ID By it's name
     * 
     * @param string $roomName
     * 
     * @return string
     */
    public function getByName(string $roomName) : string {
        foreach ($this->rooms as $room) {
            if ($room['NAME'] == $roomName) {
                return $room['ID'];
            }
        }
    }
}