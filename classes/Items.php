<?php

class Items {
    private $title;
    private $pickup_text;
    private $weight = 1;
    
    
    
    // Properties
    
    public function getTitle () {
        return $this->title;
    }
    public function setTitle ($title) {
        $this->title = $title;
    }
    
    public function getPicukText () {
        return $this->pickup_text;
    }
    public function setPicukText ($pickup_text) {
        $this->pickup_text = $pickup_text;
    }
    
    public function getWeigth () {
        return $this->weight;
    }
    public function setWeigth ($weight) {
        $this->weight = $weight;
    }
    
}
