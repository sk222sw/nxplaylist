<?php

namespace model;

/////////////////
// CLASS RESPONSIBILITY:
// talking to the DAL-classes (from controller)

/////////////////
//dependencies: 
// \dal\PlaylistDAL
// \dal\TrackDAL

class Service {
    
    public function __construct() {
        $this->pld = new \dal\PlaylistDAL();
        $this->trd = new \dal\TrackDAL();
    }
    
    public function getAllPlaylists() {
        return $this->pld->getAllPlaylists();
    }
    
    public function getTrackById($id) {
        return $this->trd->getTrackById($id);
    }
    
    public function addTrack($track) {
        $this->trd->addTrack($track);
    }
    
    public function deleteTrack($id) {
        $this->trd->deleteTrack($id);
    }
    
    public function getPlaylistById($id) {
        return $this->pld->getPlaylistById($id);
    }
    
    public function addPlaylist($playlist) {
        $this->pld->addPlaylist($playlist);
    }
    
    public function deletePlaylist($id) {
        $this->pld->deletePlaylist($id);
    }
    
}