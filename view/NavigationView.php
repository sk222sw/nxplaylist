<?php

namespace view;

// CLASS RESPONSIBILITY:
// handling routes and url query strings
class NavigationView {
    
    // route names
    private static $home = "/";
    private static $playlists = "?playlists";
    private static $newPlaylist = "?playlists/new";  //TODO
    private static $playlistId = "?playlists/{id}";  //TODO
    
    public function getUrlData() {
        return $_SERVER['REQUEST_URI'];
    }
    
    public function clickedPlaylists() {
        return strpos($this->getUrlData(), self::$playlists);
    }
    
}