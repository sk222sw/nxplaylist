<?php

namespace DAL;

require_once("model/Playlist.php");
require_once("model/DAL/DALBase.php");

class PlaylistDAL extends DALBase {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllPlaylists() {

        $sql = "SELECT Id, Title from playlist";
        $result = $this->conn->query($sql);
                
        $ret = array();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $playlist = new \model\Playlist($row["Title"]);
                $playlist->setId($row['Id']);
                $ret[] = $playlist;
            } 
        } 
        return $ret;
    }
    
    public function getPlaylistById($id) {
        $sql = "SELECT Id, Title from playlist WHERE Id=".$id;
        $result = $this->conn->query($sql);
        $row;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();    
            $ret = new \model\Playlist($row["Title"]);
            $ret->setId($row["Id"]);
        } 
        return $ret;
    }
    
    public function addPlaylist($playlist) {
        $sql = "INSERT INTO Playlist (Title) Values ('" . $playlist->getTitle() ."')";
        
        if ($this->conn->query($sql) === true) {
            $this->setMessage("playlistAdded");
            return true;
        }
        return false;
    }
    
    public function deletePlaylist($id) {
        $sql = "DELETE FROM Playlist WHERE Id =" . $id;
        if ($this->conn->query($sql) === true) {
            $this->setMessage("playlistDeleted");
        }
    }
    
}