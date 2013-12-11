<?php

class Room {
    
    private $title;
    private $description;
    private $is_off_world = false;
    
    private $exits;
    private $items;
    
    // properties 
    
    public function getTitle() {
        return $this->title;        
    }
    public function setTitle ($title) {
        $this->title = $title;
    }
    
    public function getDescription () {
       return $this->description; 
    }
    public function setDescription ($description) {
        $this->description = $description;
    }
    
    public function getIsOffWorld() {
        return $this->is_off_world;
    }
    public function setIsOffWorld($isOffWorld) {
        $this->is_off_world = $isOffWorld;
    }
    
    public function getItemsList () {
        return $this->items;
    }
    public function addItemToList($items) {
        $this->items = $items;        
    }
    
    public function __construct() {
        $this->exits = array();
        $this->items = array();
    }
    
    public function getItemList () {
        return $this->items;
    }
    
    public function getExitList () {
        return $this->exits;
    }
    
    public function getCoordinates () {
        // not supported jet...
    }

    // public Methods 
    
    public function showTitle() {
        // html: show title
    }
    
    public function getItem ($item_name) {
        foreach ( $this->items as $item) {
            if ($item == $item_name)
                return $item;
        }
        return null; // did not found any item with that name;
    }
    public function addItem ($item_name) {
        if ( ! in_array( $item_name, $this->exits) ) {
            $this->items[] = $item_name;
        }
    }
    
    public function removeItem ($item_name) {
        if ( in_array( $item_name, $this->exits) ) {
            $this->items = array_diff($this->items , array($item_name));
        }
    }
    
    public function addExit ($direction) {
        if ( ! in_array( $direction, $this->exits) ) {
            $this->exits[] = $direction;
        }
    }
    
    public function removeExit ($direction) {
        if ( in_array( $direction, $this->exits) ) {
            $this->exits = array_diff($this->exits , array($direction));
        }
    }
    
    public function canExit($direction) {
        if ( in_array( $direction, $this->exits) ) {
            return true;
        }
        return false;
    }
    
    public function toArray() {
        $room = array();
        $room['title'] = $this->title;
        $room['description'] = $this->description;
        $room['exits'] = implode(":", $this->exits);
        
        foreach ( $this->items as $item) {
            $room['items'][] = $item->toArray();
        }
        return $room;
    }
    
    
    
}
