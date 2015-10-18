<?php

namespace DAL;

require_once("model/Playlist.php");
require_once("model/DAL/DALBase.php");

class PlaylistDAL extends DALBase {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function selectAll() {

        // var_dump($this->conn);
        // exit();
        
        $sql = "SELECT Id, Title from playlist";
        $result = $this->conn->query($sql);
                
        $ret = array();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $ret[] = new \model\Playlist($row["Id"], $row["Title"]);
            } 
        } else {
            echo "0 results";
        }
        
        
        return $ret;
    }
    
    public function getPlaylistById($id) {

        $sql = "SELECT Id, Title from playlist WHERE Id=".$id;
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();         
            $ret = new \model\Playlist($row["Id"], $row["Title"]);
        } else {
            $ret = "0 results";
        }

        return $ret;

    }
    
}