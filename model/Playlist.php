<?php

namespace model;

require_once("other/ValidationHandler.php");

class Playlist {
    
    private $title;
    private $id;
    private $tracks;

    public function __construct($title) {
        $validate = new \other\ValidationHandler();
        
        try {
            $this->id = 0;
            $this->title = $title;
            $this->tracks = array();
            
            $validate->validateLength($this->title, 3, 50);       
            $validate->validateWithRegex($this->title, "/[^-a-z0-9_ ]/i");
            
            $this->DAL = new \dal\PlaylistDAL();
            $this->trackDAL = new \dal\TrackDAL();
        } catch (Exception $e) {
            echo $e;
        }
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    // add track to this playlist
    public function add($track) {
        $this->tracks[] = $track;
    }
    
    public function getTracks() {
        return $this->getTracksFromDB();
    }

    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    // public function save() {
    //     $this->DAL->addPlaylist($this);
    // }
    
    private function getTracksFromDB() {
        return $this->trackDAL->getTracksByPlaylistId($this->id);
    }
    
    
}