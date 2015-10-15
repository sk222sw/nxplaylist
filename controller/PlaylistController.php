<?php 

namespace controller;

require_once("view/PlaylistView.php");

class PlaylistController {
    
    private $playlists;
    
    public function __construct() {
    
        $this->playlists = array();    
    
        $pl1 = new \model\Playlist("techno");
        $pl2 = new \model\Playlist("hip hop");
        $pl3 = new \model\Playlist("disco");
        $pl4 = new \model\Playlist("punk");

        $this->playlists[] = $pl1;
        $this->playlists[] = $pl2;
        $this->playlists[] = $pl3;
        $this->playlists[] = $pl4;
        
    }

    public function playlistAction() {
        $this->playlistView = new \view\PlaylistView();
        
        return $this->playlistView->playlistViewHTML($this->playlists);
        
    }
    
}