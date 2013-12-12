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
        return self::$inventory_items;
    }
    
    private static function addItemToInventoryList ($item) {
        self::$inventory_items[] = $item;
    }
    
    
    // Method
    public static function getInvetoryWeight () {
        $result = 0;
        if (empty(self::$inventory_items))
            return $result;
        
        foreach (self::$inventory_items as $item) {
            $result += $item->getWeight();
        }
        return $result;
    }
    
    
    


    
    // public Methods
    public static function move ($direction) {
        $room = self::getCurrentRoom();
        
        if (!$room->canExit($direction)){
            TextBuffer::addAction("Stop cheating!");
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
        
        if ($item == null)
            return;
        
        if ( $item->getWeight() > self::$weight_capacity) {
            TextBuffer::addAction("Item is too heavy. You're already carying enough!");
            return;
        }
        $room->removeItem($item_name);
        self::$inventory_items[] = $item;
        TextBuffer::addAction( $item->getPickupText() );
    }
    
    public static function dropItem ($item_name) {
        $room = self::getCurrentRoom();
        $item = self::getInventoryItem($item_name);
        
        if ($item != null) {
            self::removeInventoryItem($item_name);
            $room->addItem($item);
            TextBuffer::addAction("You dropped " . $item_name);
        } 
    }
    
    public static function getCurrentRoom () {
        return Level::getRoom(self::$posX, self::$posY);
    }
    
    private static function removeInventoryItem ($item_name) {
        foreach (self::$inventory_items as $key => $item){
            if ($item->getTitle() == $item_name)
                unset(self::$inventory_items[$key]);
        }
    }
    
    public static function getInventoryItem ($item_name) {
        if (!empty(self::$inventory_items)) {
            foreach (self::$inventory_items as $item){
                if ($item->getTitle() == $item_name)
                    return $item;
            }
        }
        return null;
    }
    
    
    // Data Handling
    public static function initilizePlayer () {
        if (!isset($_SESSION['player'])) {
            self::$posX = 0;
            self::$posY = 0;
            return; 
        }
        
        $player = $_SESSION['player'];
        self::buildFromSession($player['posX'],
                                $player['posY'],
                                $player['inventory_item'],
                                $player['moves'],
                                $player['weight_capacity'],
                                $player['inventory_item']);
        
    }
    
    public static function savePlayerToSession () {
        $player['posX'] = self::$posX;
        $player['posY'] = self::$posY;
        $player['moves'] = self::$moves;
        $player['weight_capacity'] = self::$weight_capacity;
        
        $player['inventory_item'] = array();
        if ( !empty(self::$inventory_items)) {
            foreach ( self::$inventory_items as $item) {
                $player['inventory_item'][] = $item->toArray();
            }
        } 
        
        return $player;
        
    }
    
    public static function buildFromSession ($posX, $posY, $inventory_item, $moves, $weight_capacity, $inventory_items) {
        self::$posY = $posY;
        self::$posX = $posX;
        self::$inventory_items = $inventory_item;
        self::$moves = $moves;
        self::$weight_capacity = $weight_capacity;
        
        self::$inventory_items = array();
        if (!empty($inventory_items)) {
            foreach ( $inventory_items as $array ) {
                $item = Items::arrayToItem($array);
                self::addItemToInventoryList($item);
            }
        }
    }
}
