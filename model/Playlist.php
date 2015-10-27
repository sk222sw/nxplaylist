<?php

namespace model;

class Playlist {
    
    private $title;
    private $id;
    private $tracks;

    public function __construct($title) {
        if (strlen($title) > 50 || strlen($title) < 3) {
            // throw new \Exception("Title must be longer than 3 characters and shorter than 50 characters.");
        }
        $this->id = 0;
        $this->title = $title;
        $this->tracks = array();
        
        $this->DAL = new \dal\PlaylistDAL();
        $this->trackDAL = new \dal\TrackDAL();
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
    
    public function save() {
        $this->DAL->addPlaylist($this);
    }
    
    private function getTracksFromDB() {
        return $this->trackDAL->getTracksByPlaylistId($this->id);
    }
    
    
}