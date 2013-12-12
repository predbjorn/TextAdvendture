<?php
class CommandProcessor {
    
    public static function processCommand ($command, $arguments) {
        
        switch ($command) {
            case "help":
                self::showHelp();
                break;
            case "move":
                Player::move($arguments);
                break;
            case "pickup":
                Player::pickupItem($arguments);
                break;
            case "drop":
                Player::dropItem($arguments);
                break;
            
            // not implemented
            case "whereami":
                TextBuffer::addAction(Player::getCurrentRoom()->getCoordinates());
                break;
            case "look":
                Player::getCurrentRoom()->describe();
                break;
            default:
                break;
        }
        GameManager::applyRules();
    }
    
    public static function showHelp() {
        
    }
}
