<?php

class Player {
    private static $posX;
    private static $posY;
    
    private static $inventory_items = array();
    private static $moves = 0;
    private static $weight_capacity = 6;
    
    // properties
    public static function getPosX() {
        return self::getPosX();
    }
    public static function setPosX ($posX) {
        self::$posX = $posX;
    }
    
    public static function getPosY () {
        return self::$posY;
    }
    public static function setPosY ($posY) {
        self::$posY = $posY;
    }
    
    public static function getMoves () {
        return self::$moves;
    }
    public static function setMoves ($moves) {
        self::$moves = $moves;
    }
    
    public static function getWeightCapacity () {
        return self::$weight_capacity;
    }
    public static function setWeightCapacity ($weight_capacity) {
        self::$weight_capacity = $weight_capacity; 
    }
    public static function getInventoryList () {
        self::$inventory_items;
    }
    
    public static function getInvetoryWeight () {
        $result = 0;
        foreach (self::$inventory_items as $item) {
            $result += $item->getWeight();
        }
        return $result;
    }
    
    public static function initilizePlayer () {
//        if (!isset($_SESSION['player'])) {
            self::$posX = 0;
            self::$posY = 0;
            return; 
//        }
        
        $player = $_SESSION['player'];
        self::buildFromSession($player['posX'],
                                $player['posY'],
                                $player['inventory_item'],
                                $player['moves'],
                                $player['weight_capacity']);
        
    }
    
    public static function savePlayerToSession () {
        $player['posX'] = self::$posX;
        $player['posX'] = self::$posY;
        $player['moves'] = self::$moves;
        $player['weight_capacity'] = self::$weight_capacity;
        
        $player['inventory_item'] = implode(":", self::$inventory_items);
        
        return $player;
        
    }
    
    public static function buildFromSession ($posX, $posY, $inventory_item, $moves, $weight_capacity) {
        self::$posY = $posY;
        self::$posX = $posX;
        self::$inventory_items = $inventory_item;
        self::$moves = $moves;
        self::$weight_capacity = $weight_capacity;
    }
    


    
    // public Methods
    
    public static function move ($direction) {
        $room = self::getCurrentRoom();
        
        if (!$room->canExit($direction)){
            // HTML: cant exit here
            return;
        }
        
        self::$moves++;
        
        switch ( $direction ) {
            case Direction::NORTH:
                self::$posY--;
                break;
            case Direction::SOUTH:
                self::$posY++;
                break;
            case Direction::WEST:
                self::$posX--;
                break;
            case Direction::EAST:
                self::$posX++;
                break;
        }
        
    }
    
    public static function pickupItem ($item_name) {
        $room = self::getCurrentRoom();
        $item = $room->getItem($item_name);
        
        if ($item != null) {
            
            if (self::$inventory_items + $item->getWeigth() > self::$weight_capacity) {
                // HTML: Too heavy
                return;
            }
            $room->removeItem($item);
            self::$inventory_items[] = $item;
            // HTML: item->picukText
            
        } else {
            // HTML: there is no item like that here!
        }
    }
    
    public static function dropItem ($item_name) {
        $room = self::getCurrentRoom();
        $item = self::getInventoryItem($item_name);
        
        if ($item != null) {
            self::$inventory_items = array_diff(self::$inventory_items, array($item_name));
            $room->addItem($item_name);
            // HTML : item har blitt droppa her
            
        } else {
            // HTML: ingen itemname in tour inventory
        }
    }
    
    public static function getCurrentRoom () {
        return Level::getRoom(self::$posX, self::$posY);
    }
    
    public static function getInventoryItem ($item_name) {
        foreach (self::$inventory_items as $item){
            if ($item == $item_name)
                return $item;
        }
        return null;
    }
    
}
