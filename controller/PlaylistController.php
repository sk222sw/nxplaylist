<?php 

namespace controller;

require_once("view/UrlView.php");

require_once("view/PlaylistListView.php");
require_once("view/PlaylistView.php");
require_once("view/TrackView.php");
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
        $this->trackView = new \view\TrackView();
        $playlistDAL = new \DAL\PlaylistDAL();
        $trackDAL = new \DAL\TrackDAL();
        
        //$pl = 0;
        $playlistView = new \view\PlaylistView();
        $this->playlists = $playlistDAL->selectAll();
        if ($this->urlView->clickedSpecificTrack() == true) {
            $track = $trackDAL->getTrackById($this->urlView->getTrackId());
            return $this->trackView->trackViewHTML($track);
        }
        
        if ($playlistView->clickedAddTrack()) {
            $track = $playlistView->createTrackModel();
            if ($playlistView->createTrackModel()) {
                $trackDAL->addTrack($track);
            }
        } 
        
        if ($this->urlView->clickedDeleteTrack()) {
            // var_dump($this->urlView->getTrackId()); exit();
            $trackDAL->deleteTrack($this->urlView->getTrackId());
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