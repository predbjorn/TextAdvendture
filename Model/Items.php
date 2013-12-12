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
    
    public function getPickupText () {
        return $this->pickup_text;
    }
    public function setPickupText ($pickup_text) {
        $this->pickup_text = $pickup_text;
    }
    
    public function getWeight () {
        return $this->weight;
    }
    public function setWeight ($weight) {
        $this->weight = $weight;
    }
    
    
    // Data handling
    public function toArray () {
        $item['title'] = $this->title;
        $item['pickup_text'] = $this->pickup_text;
        $item['weight'] = $this->weight;
        return $item;
    }
    
    public static function arrayToItem ($array) {
        $item = new Items();
        $item->title = $array['title'];
        $item->pickup_text = $array['pickup_text'];
        $item->weight = $array['weight'];
        return $item;
    }
}
