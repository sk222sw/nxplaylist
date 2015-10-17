<?php

namespace DAL;

require_once("model/Playlist.php");
require_once("model/DAL/DALBase.php");

class PlaylistDAL extends DALBase {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function selectAll() {
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
        
        $this->conn->close();        
        
        return $ret;
    }
    
    public function getPlaylistById($id) {
        $server = "eu-cdbr-west-01.cleardb.com";
        $username = "bff0e401b5096a";
        $password = "3ae2ffe2";
        $db = "heroku_c1e3b5ffbfdbe7f";
        
        $conn = new \mysqli($server, $username, $password, $db);            

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT Id, Title from playlist WHERE Id=" . $id;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();         
            $ret = new \model\Playlist($row["Id"], $row["Title"]);
        } else {
            $ret = "0 results";
        }

        $conn->close();        
        return $ret;

    }
    
}