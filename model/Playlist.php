<?php

namespace model;

class Playlist {
    
    private $title;
    private $id;

    public function __construct($title) {
        $this->title = $title;
        
        $this->tracks = array();
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    // add track to this playlist
    public function add($track) {
        $this->tracks[] = $track;
    }
    
    public function getTracks() {
        return $this->tracks();
    }

    public function getId() {
        return $this->id;
    }
    
}