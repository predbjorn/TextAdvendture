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
        return "debug function not available";
        // not supported jet...
    }

    // public Methods 
    
    public function showTitle() {
        // html: show title
    }
    
    public function getItem ($item_name) {
        foreach ( $this->items as $item) {
            if ($item->getTitle() == $item_name)
                return $item;
        }
        return null; // did not found any item with that name;
    }
    public function addItem ($item) {
        $this->items[] = $item;
    }
    
    public function removeItem ($item_name) {
        foreach ($this->items as $key => $item){
            if ($item->getTitle() == $item_name)
                unset($this->items[$key]);
        }
    }
    
    public function addExit ($direction) {
        if ( ! in_array( $direction, $this->exits) ) {
            $this->exits[] = $direction;
        }
    }
    
    public function removeExit ($direction) {
        if ( in_array( $direction, $this->exits) ) {
            foreach ($this->exits as $key => $exit){
                if ($exit == $direction)
                    unset($this->exits[$key]);
            }
        }
    }
    
    public function canExit($direction) {
        if ( in_array( $direction, $this->exits) ) {
            return true;
        }
        return false;
    }
    
    // Data handling
    public function toArray() {
        $room = array();
        $room['title'] = $this->title;
        $room['description'] = $this->description;
        
        if (!empty($this->exits)) {
            foreach ( $this->exits as $exit) {
                $room['exits'][] = $exit;
            }
        } else {
            $room['exits'] = array();
        }
        
        foreach ( $this->items as $item) {
            $room['items'][] = $item->toArray();
        }
        return $room;
    }
    
    public static function arrayToRoom($array) {
        $addRoom = new Room();

        $addRoom->setTitle($array['title']);
        $addRoom->setDescription($array['description']);

        // add Exit
        if (!empty($array['exits'])) {
            foreach ( $array['exits'] as $exit) {
                $addRoom->addExit($exit);
            }
        }
        
        // add Items
        if (!empty($array['items'])) {
            foreach ( $array['items'] as $item) {
                $addRoom->addItem(Items::arrayToItem( $item ));
            }
        }
        
        return $addRoom;
        
    }
    
    
}
