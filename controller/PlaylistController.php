<?php 

namespace controller;

require_once("view/UrlView.php");

require_once("view/PlaylistListView.php");
require_once("view/PlaylistView.php");
require_once("model/DAL/PlaylistDAL.php");
require_once("model/DAL/TrackDAL.php");
require_once("model/Track.php");

class PlaylistController {
    
    private $playlists;
    
    public function __construct() {
        $this->playlists = array();    
    }

    public function playlistAction() {
        $this->urlView = new \view\UrlView();
        $this->playlistListView = new \view\PlaylistListView();
        $playlistDAL = new \DAL\PlaylistDAL();
        $trackDAL = new \DAL\TrackDAL();
        
        //$pl = 0;
        $playlistView = new \view\PlaylistView();
        $this->playlists = $playlistDAL->selectAll();
        
        if ($playlistView->clickedAddTrack()) {
            $track = $playlistView->createTrackModel();
            $trackDAL->addTrack($track);
        } 
        
        if($this->urlView->clickedSpecificPlaylist() == true){
            $pl = $playlistDAL->getPlaylistById($this->urlView->getPlaylistId());
            return $playlistView->playlistViewHTML($pl);
        }
        if ($this->playlistListView->clickedAddPlaylist()) {
            $playlist = $this->playlistListView->createPlaylistModel();
        }
        if ($this->urlView->clickedDeletePlaylist()) {
            $playlistDAL->deletePlaylist($this->urlView->getPlaylistId());
        }
        
        $playlistDAL->close();
        return $this->playlistListView->playlistListViewHTML($this->playlists);
    }
    

}