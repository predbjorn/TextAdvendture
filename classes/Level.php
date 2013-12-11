<?php

/*
 * 
 * 
 * 
 * 
 */
class Level {
    
    private static $rooms; // Liste som inneholder mange Rooms

    // properties 
    public static function getRooms () {
        return self::$rooms;
    }
    
    public static function BuildLevel() {
        
        $this->rooms = "";
        
        // bygg en session :
        // [rom 1] 
        //      [items]
        //      [doors}
        //      osv
        //////////////////////////////////
        //RED ROOM
        $room;
    }
}
