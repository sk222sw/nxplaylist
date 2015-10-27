<?php

namespace DAL;

class TrackDAL extends DALBase {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function addTrack($track) {
        $sql = 'INSERT INTO Track (PlaylistId, Title, Url) 
        VALUES (' .$track->getPlaylistId().', "'.$track->getTitle().'", "'.$track->getUrl().'")';
        if ($this->conn->query($sql) === true) {
            $this->setMessage("trackAdded");
            return true;
        }
        return false;        
    }
    
}