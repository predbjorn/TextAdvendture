<?php

class Player {
    private static $posX;
    private static $posY;
    
    private static $inventory_item;
    private static $moves = 0;
    private static $weight_capacity = 6;
    
    // properties
    public static function getPosX() {
        return self::getPosX();
    }
    public function setPosX ($posX) {
        self::$posX = $posX;
    }
    
    public static function getPosY () {
        return self::$posY;
    }
    public function setPosY ($posY) {
        self::$posY = $posY;
    }
    
    public function getMoves () {
        return self::$moves;
    }
    public function setMoves ($moves) {
        self::$moves = $moves;
    }
    
    public function getWeightCapacity () {
        return self::$weight_capacity;
    }
    public function setWeightCapacity ($weight_capacity) {
        self::$weight_capacity = $weight_capacity; 
    }
    
    public static function getInvetoryWeight () {
        
    }
    
    
    // public Methods
    public static function __construct() {
        
    }
    
    public static function move ($direction) {
        
    }
    
    public static function pickupItem ($item_name) {
        
    }
    
    public static function dropItem ($item_name) {
        
    }
    
    public static function displayInventory () {
        
    }
    
    public static function getCurrentRoom () {
        
    }
    
    public static function getInventoryItem ($item_name) {
        
    }
    
}
