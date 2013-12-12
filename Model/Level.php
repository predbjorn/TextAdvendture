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
        
        $room->setTitle("Red Room");
        $room->setDescription("You have entered the red room! There is a locked door down from here");
        $room->addExit(Direction::EAST);
        
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
        
        
        
        //////////////////////////////////
        //Blue ROOM
        
        $room = new Room();
        
        $room->setTitle("Blue Room");
        $room->setDescription("You have entered the blue room!");
        $room->addExit(Direction::WEST);
        $room->addExit(Direction::SOUTH);
        
        
        $item = new Items();
        $item->setTitle("key");
        $item->setPickupText("You just picked up the key");
        
        $room->addItem($item);
        
        $item = new Items();
        $item->setTitle("red ball");
        $item->setPickupText("You just picked up the red ball");
        
        $room->addItem($item);
        
        self::$rooms['1,0'] = $room;
        
        
        //////////////////////////////////
        //Green ROOM
        
        $room = new Room();
        
        $room->setTitle("Green Room");
        $room->setDescription("You have entered the green room!");
        
        $item = new Items();
        $item->setTitle("yellow ball");
        $item->setPickupText("You just picked up the yellow ball");
        
        $room->addItem($item);
        
        self::$rooms['0,1'] = $room;
        
        
        //////////////////////////////////
        //YELLOW ROOM
        
        $room = new Room();
        
        $room->setTitle("yellow Room");
        $room->setDescription("You have entered the yellow room!");
        $room->addExit(Direction::NORTH);
        $room->addExit(Direction::WEST);
        
        $item = new Items();
        $item->setTitle("green ball");
        $item->setPickupText("You just picked up the green ball");
        
        $room->addItem($item);
        
        self::$rooms['1,1'] = $room;
    }
}
