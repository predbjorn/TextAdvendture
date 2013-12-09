<?php

class Direction extends SplEnum{
    
    const NORTH = "north";
    const SOUTH = "south";
    const WEST  = "west";
    const EAST  = "east";
    
    public static function isValidDirection($direction) {
        switch ($direction) {
            case self::EAST:
                return true;
            case self::SOUTH:
                return true;
            case self::WEST:
                return true;
            case self::NORTH:
                return true;
            default:
                return false;
        }
    }
    
}
