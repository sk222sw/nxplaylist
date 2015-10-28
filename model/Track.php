<?php

namespace model;

/////////////////
// CLASS RESPONSIBILITY:
// model class for Track objects - get/return/construct objects

/////////////////
//dependencies: 
// \other\ValidationHandler

require_once("other/ValidationHandler.php");

class Track {
    
    private $id;
    private $playlistId;
    private $title;  
    private $url;
    
    public function __construct($id, $playlistId, $title, $url) {
        $validate = new \other\ValidationHandler();
        
        try {
            $this->id = $id;
            $this->playlistId = $playlistId;
            $this->title = $title;
            $this->url = $url;
            
            $validate->validateLength($this->title, 3, 50);
            $validate->validateWithRegex($this->title, "/[^-a-z0-9_ ]/i");
        } catch (Exception $e) {
            echo $e;
        }
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