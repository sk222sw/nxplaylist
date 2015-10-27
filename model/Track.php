<?php

namespace model;

class Track {
    
    private $playlistId;
    private $title;  
    private $url;
    
    public function __construct($playlistId, $title, $url) {
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
    
}