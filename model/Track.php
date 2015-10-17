<?php

namespace model;

class Track {
    
    //Entered by user or from youtube api?
    private $url;
    private $length;
    private $title;  
    
    public function __construct($url, $length, $title) {
        $this->url = $url;
        $this->length = $length;
        $this->title = $title;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
}