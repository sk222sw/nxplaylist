<?php

namespace DAL;

/////////////////
// CLASS RESPONSIBILITY:
// handles connecting to DB and calls session to set DB call flash messages

/////////////////
//dependencies: 
// \other\SessionHandler

class DALBase {
    
    protected $conn;
    private $session;
    
    public function __construct() {
        $this->conn = $this->connect();
        $this->session = new \other\SessionHandler();
    }
    
    private function connect() {
        $server = "eu-cdbr-west-01.cleardb.com";
        $username = "bff0e401b5096a";
        $password = "3ae2ffe2";
        $db = "heroku_c1e3b5ffbfdbe7f";

        $conn = new \mysqli($server, $username, $password, $db);   
        $conn->set_charset("utf8");
        
        if ($conn->connect_errno) {
            printf("Connect failed: %s\n", $conn->connect_error);
            mysqli_close($conn);
            exit();
        }
        return $conn;
    }
    
    protected function setMessage($value) {
        $this->session->setMessage($value);
    }
    
    public function close() {
        mysqli_close($this->conn);
    }
}