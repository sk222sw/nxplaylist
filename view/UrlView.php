<?php

namespace view;

// CLASS RESPONSIBILITY:
// handling routes and url query strings
class UrlView {
    
    // route names
    private static $home = "/";
    private static $playlists = "?playlists";
    private static $newPlaylist = "?playlists/new";  //TODO
    private static $playlistId = "pl";
    private static $deleteId = "del";
    
    public function getUrlData() {
        return $_SERVER['REQUEST_URI'];
    }
    
    public function clickedPlaylists() {
        return strpos($this->getUrlData(), self::$playlists);
    }
    
    public function clickedSpecificPlaylist() {
        return strpos($this->getUrlData(), "?pl=");
    }
    
    public function getPlaylistId() {
        if (isset($_GET['pl'])) {
            return $_GET['pl'];        
        } 
        if ($this->clickedDeletePlaylist()) {
            return $_GET['del'];        
        }         
        return "No id requested.";
    }
    
    public function clickedDeletePlaylist() {
        return isset($_GET['del']);
    }

}