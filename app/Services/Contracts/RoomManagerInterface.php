<?php

namespace ConferenceRoomStatus\Services\Contracts;

interface RoomManagerInterface {

    /**
     * Get all loaded rooms
     * 
     * @return array
     */
    public function all() : array;

    /**
     * Get a Room ID By it's name
     * 
     * @param string $roomName
     * 
     * @return string
     */
    public function getByName(string $roomName) : string;
}