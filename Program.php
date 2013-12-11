<?php

class Program {
    
    public function game($gameState, $command = null, $arguments = null) {
        
        switch ( self::$gameState) {
            case "end":
                echo GameManager::endGame();
            case "start":
                GameManager::startGame();
            default:
                GameManager::initialize();
                CommandProcessor::processCommand($command, $arguments);
                echo GameManager::displayGame();
        }
    }
    
    
    
}
