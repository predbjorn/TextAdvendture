<?php
class CommandProcessor {
    
    public static function processCommand ($line) {
        
        $command = TextUtilities::extractCommand($line);
        $arguments = TextUtilities::extractArguments($line);
        
        
        switch ($command) {
            case "exit":
                Program::$quit = true;
                return;
            case "help":
                self::showHelp();
                break;
            case "move":
                Player::move($arguments);
                break;
            case "look":
                Player::getCurrentRoom()->describe();
            case "pickup":
                Player::pickupItem($arguments);
                break;
            case "drop":
                Player::dropItem($arguments);
                break;
            case "inventory":
                Player::displayInventory();
                break;
            case "whereami":
                Player::getCurrentRoom()->showTitle();
                break;
            default:
                break;
        }
        GameManager::applyRules();
        TextBuffer::display();
        
    }
    
    public static function showHelp() {
        
    }
}
