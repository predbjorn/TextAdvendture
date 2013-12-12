<?php

class TextBuffer {
    
    private static $action = "";
    public static $end_game_text = "";
    
    public static function addAction($action) {
        self::$action .= $action . "<br>";
    }
    
    public static function getAction () {
        return self::$action;
    }
    
    public static function addEndGameText($end_game_text) {
        self::$end_game_text .= $end_game_text . "<br>";
    }
    
    public static function getEndGameText () {
        return self::$end_game_text;
    }
    
}
