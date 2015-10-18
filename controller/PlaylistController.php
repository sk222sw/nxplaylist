<?php 

namespace controller;

require_once("view/UrlView.php");

require_once("view/PlaylistListView.php");
require_once("view/PlaylistView.php");
require_once("model/DAL/PlaylistDAL.php");

class PlaylistController {
    
    private $playlists;
    
    public function __construct() {
        $this->playlists = array();    
    }

    public function playlistAction() {
        $this->urlView = new \view\UrlView();
        $this->playlistListView = new \view\PlaylistListView();
        $DAL = new \DAL\PlaylistDAL();
        
        $playlistView = new \view\PlaylistView();
        
        $this->playlists = $DAL->selectAll();
        
        if($this->urlView->clickedSpecificPlaylist()){
            $pl = $DAL->getPlaylistById($this->urlView->getPlaylistId());
            return $playlistView->playlistViewHTML($pl->getTitle());
        }
        if ($this->playlistListView->clickedAddPlaylist()) {
            $DAL->addPlaylist($this->playlistListView->getPostTitle());
        }
        
        return $this->playlistListView->playlistListViewHTML($this->playlists);
        
    }
    
}