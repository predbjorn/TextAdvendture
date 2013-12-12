<?php

class html {
    
    private $room;
    private $info;
    private $move;
    private $items;
    private $drop;
    
    public function __construct() {
        $this->room = "";
        $this->info = "";
        $this->move = "";
        $this->items = "";
        $this->drop = "";
    }
    
    public function showRoom ($exits, $description, $title, $action) {
        $this->room = ' <div id="room"><div id="room_description">';
        $this->room .= '<h1>' . $title . '</h1>';
        $this->room .= '<p>' . $description . '</p>';
        $this->room .= '<p class="white">' . $action. '</p>';
        
        if (!empty($exits)) {
            foreach ( $exits as $direction) {
                $this->room .= '<div id="'. $direction .'" class="door">'. $direction .'</div>';
            }
        }
        
        $this->room .= '</div></div>';
    }
    
    
    public function showInfo ($item_in_inventory, $inventory_weigth, $players_capacity) {
        $this->info .= '<div id="info">';
        $this->info .= '</div>';
    }
    
    public function showMove ($directions) {
        $this->move = '<div class="command_box">';
        $this->move .= '<h3>Move:</h3>';
        $this->move .= '<form><input type="hidden" name="command" value="move">';
        
        if (!empty($directions)) {
            foreach ($directions as $direction) {
                $this->move .= '<input type="submit" name="argument" value="'.$direction.'">';
            }
        }
        $this->move .= '</form></div>';
    }
    public function showItems ($items_in_room) {
        $this->items = '<div class="command_box">';
        $this->items .= '<h3>Pickup Item:</h3>';
        $this->items .= '<form><input type="hidden" name="command" value="pickup">';
        
        if (!empty($items_in_room)) {
            foreach ($items_in_room as $item) {
                $this->items .= '<input type="submit" name="argument" value="'.$item->getTitle().'">';
            }
        }
        $this->items .= '</form></div>';
    }
    public function showDrop ($inventory) {
        $this->drop = '<div class="command_box">';
        $this->drop .= '<h3>Drop Item:</h3>';
        $this->drop .= '<form><input type="hidden" name="command" value="drop">';
        
        if (!empty($inventory)) {
            foreach ($inventory as $item) {
                $this->drop .= '<input type="submit" name="argument" value="'.$item->getTitle().'">';
            }
        }
        $this->drop .= '</form></div>';
    }
    
    public function getGameView () {
        $out = $this->room . $this->info;
        
        $out .= '<div id="commands">';
        $out .= $this->move . $this->items . $this->drop;
        $out .= '</div>';
        
        return $out;
    }
    
    
    public static function endGameScreen($endgame_text) {
        $out = ' <a href="" onclick="location.reload(true);" ></a>';
        $out .= ' <div id="room"><div id="room_description">';
        $out .= '<h1>'.$endgame_text.'</h1>';
        $out .= '<p> Click to start new game </p>';        
        $out .= '</div></div>';
        
        return $out;
    }
}
