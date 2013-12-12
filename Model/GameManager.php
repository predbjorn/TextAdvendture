<?php

//namespace 

class GameManager {
    
    public static function initialize() {
        Level::initialize();
        Player::initilizePlayer();
        
        //get commandProcessor
        
        
    }
        
    public static function displayGame () {
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
    
    public static function saveSession () {
        
        $_SESSION['level'] = Level::saveLevelsToSession();
        $_SESSION['player'] = Player::savePlayerToSession();
    }
    /*
        ////////////  PLAYER  /////////////////////
        $player['posX'] = 0;
        $player['posX'] = 0;
        $player['inventory_item'] = array();
        $player['moves'] = 0;
        $player['weight_capacity'] = 6;
        
        $_SESSION['player'] = $player;
        
        
        ////////////  ROM  ////////////////////////
        
         // Red Room
        $room['title'] = "Red Room";
        $room['description'] = "You have entered the Red Room! There is a loocked door to the sout";
        $room['add_exit'] = "east";
        $room['can_exit'] = "south";
        
        $item['title'] = "Blue ball";
        $item['pickup_text'] = "You just pickup the blue ball";
        
        $room['items'] = $item;
        $rooms['0:0'] = $room;
        
        
        
        $rooms['0:0']['title'] = "Red Room";
        
        $rooms['0:0']['title'] = "Red Room";
        
        $rooms['0:0']['title'] = "Red Room";
        
        */
        
    
    
    public static function endGame () {
        \session_destroy();
        return Html::endGameScreen("Game over");
        
    }
    
    public static function applyRules () {
        
//        if (Level::getRoom(0,0)->getItem("red ball") != null) {
//            
//        }
        
    }
        /*
        if (Level.Rooms[0, 0].GetItem("red ball") != null &&
                Level.Rooms[1, 0].GetItem("blue ball") != null &&
                Level.Rooms[0, 1].GetItem("green ball") != null &&
                Level.Rooms[1, 1].GetItem("yellow ball") != null)
            EndGame("Good jobb, logic is on your side boy");

            if (Player.GetInventoryItem("key") != null)
            {
                Level.Rooms[0, 0].AddExit(Direction.South); //red room
                Level.Rooms[0, 0].Description = " You have entered the red room";

                Level.Rooms[0, 1].AddExit(Direction.North); //green room
                Level.Rooms[0, 1].Description = " You have entered the green room";

                Level.Rooms[1, 1].AddExit(Direction.West); //yellow room
                Level.Rooms[1, 1].Description = " You have entered the yellow room";
            }

            if (Player.Moves > 10)
                EndGame("You are old and slow");
        }
    }*/
}
