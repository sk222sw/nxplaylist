<?php

namespace DAL;
require_once("model/Playlist.php");

class PlaylistDAL {
    
    public function selectAll() {
        $servername = getenv('IP');
        $username = getenv('C9_USER');
        $password = "";
        $database = "nxplaylist";
        $dbport = 3306;
        
        $conn = new \mysqli($servername, $username, $password, $database, $dbport);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT Title from playlist";
        $result = $conn->query($sql);
        
        $ret = array();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $ret[] = new \model\Playlist($row["Title"]);
            } 
        } else {
            echo "0 results";
        }
        
        $conn->close();        
        
        return $ret;
    }
    
}