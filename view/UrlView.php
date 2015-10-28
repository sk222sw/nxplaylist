<?php

namespace view;

// CLASS RESPONSIBILITY:
// handling routes and url query strings
class UrlView {
    
    // route names
    private static $home = "/";
    private static $playlists = "?playlists";
    private static $playlistId = 'pl';
    private static $deleteId = 'del';
    private static $deleteTrackId = 'trackdel';
    private static $trackId = 'tr';
    
    public function getUrlData() {
        return $_SERVER['REQUEST_URI'];
    }
    
    public function clickedPlaylists() {
        return strpos($this->getUrlData(), self::$playlists);
    }
    
    public function clickedSpecificPlaylist() {
        return strpos($this->getUrlData(), "?".self::$playlistId."=");
    }
    
    public function clickedSpecificTrack() {
        return strpos($this->getUrlData(), "?".self::$trackId."=");
    }    
    
    public function getPlaylistId() {
        if (isset($_GET[self::$playlistId])) {
            return $_GET[self::$playlistId];        
        } 
        if ($this->clickedDeletePlaylist()) {
            return $_GET[self::$deleteId];        
        }         
    }

    public function getTrackId() {
        if (isset($_GET[self::$deleteTrackId])) {
            return $_GET[self::$deleteTrackId];
        } else if (isset($_GET[self::$trackId])){
            return $_GET[self::$trackId];
        } return false;
    }
    
    public function clickedDeletePlaylist() {
        return isset($_GET[self::$deleteId]);
    }
    
    public function clickedDeleteTrack() {
        return isset($_GET[self::$deleteTrackId]);
    }

}