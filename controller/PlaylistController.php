<?php 

namespace controller;

require_once("view/UrlView.php");

require_once("view/PlaylistListView.php");
require_once("view/PlaylistView.php");

class PlaylistController {
    
    private $playlists;
    
    public function __construct() {
    
        $this->playlists = array();    
    
        $pl1 = new \model\Playlist("techno");
        $pl2 = new \model\Playlist("hip hop");
        $pl3 = new \model\Playlist("disco");
        $pl4 = new \model\Playlist("punk");

        // $t1 = new \model\Track("https://www.youtube.com/watch?v=5IrHzrg4qdQ", "6:25", "Ben Klock - Subzero");
        // $t1 = new \model\Track("https://www.youtube.com/watch?v=cRKhrD-MuW4", "7:48", "Kölsch - Opa");

        $this->playlists[] = $pl1;
        $this->playlists[] = $pl2;
        $this->playlists[] = $pl3;
        $this->playlists[] = $pl4;
    }

    public function playlistAction() {
        $this->urlView = new \view\UrlView();
        $this->playlistListView = new \view\PlaylistListView();
        $playlistView = new \view\PlaylistView();
        
        
        if($this->urlView->clickedSpecificPlaylist()){
            return $playlistView->playlistViewHTML($this->playlists[1]->getTitle());
        }
        
        return $this->playlistListView->playlistListViewHTML($this->playlists);
        
    }
    
}