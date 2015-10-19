<?php

namespace other;

class MessageHandler {
    
    private static $addedPlaylist = "Playlist added!";
    private static $deletedPlaylist = "Deleted added!";
    
    public function __construct() {
        $this->messages = array();
        $this->messages[] = $addedPlaylist;
        $this->messages[] = $deletedPlaylist;
    }
    
    public function getMessageText($key) {
        
    }
    
    
}