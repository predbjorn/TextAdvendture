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
    
    public static function getRoom ($posX, $posY) {
        $pos = $posX . "," . $posY;
        return self::$rooms[$pos];
    }
    
    public static function initialize(  ) {
//        if (!isset($_SESSION['level'])) {
            self::BuildLevel();
//            return;
//        }
//        self::buildFromSession($_SESSION['level']);
    }
    
    public static function saveLevelsToSession() {
        
        
        
        return ;
    }
    
    private static function buildFromSession () {
        
    }


    private static function buildLevel() {
        
        //////////////////////////////////
        //RED ROOM
        $room = new Room();
        
        $room->setTitle("Red Room");
        $room->setDescription("You have entered the red room! There is a locked door to the right");
        $room->addExit(Direction::EAST);
        $room->addExit(Direction::SOUTH);
        
        $item = new Items();
        $item->setTitle("Blue ball");
        $item->setPicukText("You just picked up the blue ball");
        
        $room->addItemToList($item);
        
        self::$rooms['0,0'] = $room;
        
        
        
        //////////////////////////////////
        //RED ROOM
        
        $room = new Room();
        
        $room->setTitle("Blue Room");
        $room->setDescription("You have entered the blue room!");
        $room->addExit(Direction::WEST);
        $room->addExit(Direction::SOUTH);
        
        self::$rooms['1,0'] = $room;
        
        
        //////////////////////////////////
        //Green ROOM
        
        $room = new Room();
        
        $room->setTitle("Green Room");
        $room->setDescription("You have entered the green room!");
        $room->addExit(Direction::EAST);
        
        $item = new Items();
        $item->setTitle("yellow ball");
        $item->setPicukText("You just picked up the yellow ball");
        
        $room->addItemToList($item);
        
        self::$rooms['0,0'] = $room;
        
        
        //////////////////////////////////
        //YELLOW ROOM
        
        $room = new Room();
        
        $room->setTitle("yellow Room");
        $room->setDescription("You have entered the yellow room!");
        $room->addExit(Direction::EAST);
        
        $item = new Items();
        $item->setTitle("red ball");
        $item->setPicukText("You just picked up the red ball");
        
        $room->addItemToList($item);
        
        self::$rooms['0,0'] = $room;
    }
}
