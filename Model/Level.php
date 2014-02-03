<?php
class Level {
    
    private static $rooms; // Liste som inneholder mange Rooms

    // properties 
    public static function getRooms () {
        return self::$rooms;
    }
    
    public static function getRoom ($posX, $posY) {
        $pos = $posX . "," . $posY;
        return self::$rooms[$pos];
    }
    
    
    // Methods
    
    public static function initialize(  ) {
        if (!isset($_SESSION['level'])) {
            self::BuildLevel();
            return;
        }
        self::buildFromSession($_SESSION['level']);
    }
    
    // DataHandling
    public static function saveLevelsToSession() {
        $out = array();
        foreach (self::$rooms as $pos => $room ) {
            $out[$pos] = $room->toArray();
        }
        return $out;
    }
    
    private static function buildFromSession ($session) {
        foreach ( $session as $pos => $room ) {
            self::$rooms[$pos] = Room::arrayToRoom( $room );
        }
    }


    private static function buildLevel() {
        
        //////////////////////////////////
        //RED ROOM
        
        $room = new Room();
        
        $room->setTitle("THE CAVE!");
        $room->setDescription("You are in a cave. The opening has broken down.<br>"
                . " You are bleeding hard from youre right arm. You will die if you don't get out within 13 hour <br>"
                . "You only have two options: There might be tunnel under water east of here. There is also a dark tunnel south.");
        $room->addExit(Direction::EAST);
        $room->addExit(Direction::SOUTH);
        
        $item = new Items();
        $item->setTitle("blue ball");
        $item->setPickupText("You just picked up the blue ball");
        
        $room->addItem($item);
        
        $item = new Items();
        $item->setTitle("mountain");
        $item->setWeight(8);
        $item->setPickupText("Superman!");
        
        $room->addItem($item);
        
        self::$rooms['0,0'] = $room;
        
        
        
    }
}
