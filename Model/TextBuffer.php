<?php

class TextBuffer {
    
    private static $action = "";
    
    public static function addAction($action) {
        self::$action .= $action . "<br>";
    }
    
    public static function getAction () {
        return self::$action;
    }
    
}
