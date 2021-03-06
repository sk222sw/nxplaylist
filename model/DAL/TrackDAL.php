<?php

namespace DAL;

/////////////////
// CLASS RESPONSIBILITY:
// handles calls to DB concerning Tracks
// inherits from DALBase

/////////////////
//dependencies: 
// \dal\DALBase
// \model\Track

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
    
    public function getTracksByPlaylistId($playlistId) {
        $sql = "SELECT Id, PlaylistId, Title, Url from Track WHERE PlaylistId=".$playlistId;
        
        $result = $this->conn->query($sql);
                
        $trackList = array();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $track = new \model\Track($row["Id"], $row["PlaylistId"], $row["Title"], $row["Url"]);
                $trackList[] = $track;
            } 
        }
        
        return $trackList;
    }
    
    public function getTrackById($id) {
        $sql = "SELECT Id, PlaylistId, Title, Url from Track WHERE Id=".$id;
        $result = $this->conn->query($sql);
        $track;
        $row;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();    
            $track = new \model\Track($row["Id"], $row["PlaylistId"], $row["Title"], $row["Url"]);
        } 
        return $track;
    }
      
    public function deleteTrack($id) {
        $sql = "DELETE FROM Track WHERE Id =" . $id;
        if ($this->conn->query($sql) === true) {
            $this->setMessage("trackDeleted");
        }
    }    
       
}