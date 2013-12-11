<?php

class TextBuffer {
    
    private static $output_buffer = "";
    
    public static function add($text) {
        self::$output_buffer .= $text . "<br>";
    }
    
    public static function display () {
        
    }
    
}
