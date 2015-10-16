<?php

namespace DAL;
require_once("model/Playlist.php");

class PlaylistDAL {
    
    public function selectAll() {
        // $servername = getenv('IP');
        // $username = getenv('C9_USER');
        // $password = "";
        // $database = "nxplaylist";
        // $dbport = 3306;
        
        
        // $conn = new \mysqli($servername, $username, $password, $database, $dbport);
        
        // $DATABASE_URL='mysql://bff0e401b5096a:3ae2ffe2@eu-cdbr-west-01.cleardb.com/heroku_c1e3b5ffbfdbe7f?reconnect=true';
            
        // $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        // var_dump($url);
        // $server = $url["host"];
        // $username = $url["user"];
        // $password = $url["pass"];
        // $db = substr($url["path"], 1);
        
        $server = "eu-cdbr-west-01.cleardb.com";
        $username = "bff0e401b5096a";
        $password = "3ae2ffe2";
        $db = "heroku_c1e3b5ffbfdbe7f";
        
        $conn = new \mysqli($server, $username, $password, $db);            

        

        
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