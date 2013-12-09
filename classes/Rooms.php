<?php

class Rooms {
    
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
    
    public function getItems () {
        return $this->items;
    }
    public function setItems($items) {
        $this->items = $items;        
    }
    
    public function __construct() {
        $this->exits = array();
        $this->items = array();
    }
    

    // public Methods 
    
    public function describe() {
        
    }
    
    public function showTitle() {
        
    }
    
    public function getItem ($item_name) {
        
    }
    
    public function addExit ($direction) {
        
    }
    
    public function removeExit ($direction) {
        
    }
    
    public function canExit($direction) {
        
    }


    // Private Methods
    
    private function getItemList () {
        
    }
    
    private function getExitList () {
        
    }
    
    private function getCoordinates () {
        
    }
    
    
}
