<?php

namespace model;

class Track {
    
    private $id;
    private $playlistId;
    private $title;  
    private $url;
    
    public function __construct($id, $playlistId, $title, $url) {
        $this->id = $id;
        $this->playlistId = $playlistId;
        $this->title = $title;
        $this->url = $url;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getPlaylistId() {
        return $this->playlistId;
    }
    
    public function getUrl() {
        return $this->url;
    }
    
    public function getId() {
        return $this->id;
    }
    
}