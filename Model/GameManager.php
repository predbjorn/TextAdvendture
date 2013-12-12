<?php

//namespace 

class GameManager {
    
    private static $end_game = false;

    public static function goGame($command, $arguments) {
        self::initialize();
        self::processCommand($command, $arguments);
        self::applyRules();
        if (!self::$end_game) {
            self::saveSession();
        }
    }

    private static function initialize() {
        Level::initialize();
        Player::initilizePlayer();
    }
    
    private static function processCommand ($command, $arguments) {
        
        switch ($command) {
            case "move":
                Player::move($arguments);
                break;
            case "pickup":
                Player::pickupItem($arguments);
                break;
            case "drop":
                Player::dropItem($arguments);
                break;
            
            // debug
            case "end":
                self::endGame("Debug ending!");
                break;
            
            // not implemented
            case "jump":
                // jump to (x,y)
                break;
            case "whereami":
                TextBuffer::addAction(Player::getCurrentRoom()->getCoordinates());
                break;
            default:
                break;
        }
    }
    
    private static function saveSession () {
        $_SESSION['level'] = Level::saveLevelsToSession();
        $_SESSION['player'] = Player::savePlayerToSession();
    }
    
    
    
    private static function applyRules () {
        
        if (    Level::getRoom(0,0)->getItem("red ball") != null &&
                Level::getRoom(1,0)->getItem("blue ball") != null &&
                Level::getRoom(0,1)->getItem("green ball") != null &&
                Level::getRoom(1,1)->getItem("yellow ball") != null) {
            self::endGame("WHIIIIIIIIII");
        }
        
        if (Player::getInventoryItem("key") != null) {
            Level::getRoom(0,0)->addExit(Direction::SOUTH); // red room
            Level::getRoom(0,1)->addExit(Direction::NORTH); // green room
            Level::getRoom(1,1)->addExit(Direction::WEST); // yellow room
        }
        
        var_dump(Player::getMoves());
        if (Player::getMoves() > 10) {
            self::endGame("You are old and slow!");
        }
    }
    
    public static function endGame ($text = "Game over") {
        TextBuffer::addEndGameText($text);
        \session_destroy();
    }
    
    public static function displayGame () {
        
        if (self::$end_game) {
            $end_game_text = TextBuffer::getEndGameText();
            return Html::endGameScreen($end_game_text);
        }
        
        
        $room = Player::getCurrentRoom();
        
        
        $html = new html();
        $html->showRoom(
                $room->getExitList(), 
                $room->getDescription(), 
                $room->getTitle(),
                TextBuffer::getAction()
            );
        $html->showInfo(
                Player::getInventoryList(), 
                Player::getWeightCapacity(),
                Player::getInvetoryWeight()
            );
        $html->showMove($room->getExitList());
        $html->showItems($room->getItemList());
        $html->showDrop(Player::getInventoryList());
        
        return $html->getGameView();
    }
}
