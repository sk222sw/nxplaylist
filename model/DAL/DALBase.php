<?php

namespace DAL;

class DALBase {
    
    protected $conn;
    
    public function __construct() {
        $this->conn = $this->connect();
    }
    
    public function connect() {
        $server = "eu-cdbr-west-01.cleardb.com";
        $username = "bff0e401b5096a";
        $password = "3ae2ffe2";
        $db = "heroku_c1e3b5ffbfdbe7f";        
        
        $conn = new \mysqli($server, $username, $password, $db);   
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        return $conn;
    }
    
}