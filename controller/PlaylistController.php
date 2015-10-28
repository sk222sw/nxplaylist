<?php 

namespace controller;

require_once("view/UrlView.php");
require_once("view/PlaylistListView.php");
require_once("view/PlaylistView.php");
require_once("view/TrackView.php");
require_once("model/DAL/PlaylistDAL.php");
require_once("model/DAL/TrackDAL.php");
require_once("model/Track.php");
require_once("model/Service.php");

class PlaylistController {
    
    private $playlists;
    
    public function __construct() {
        $this->playlists = array();    
        $this->service = new \model\Service();
    }

    public function playlistAction() {
        $this->urlView = new \view\UrlView();
        $this->playlistListView = new \view\PlaylistListView();
        $this->trackView = new \view\TrackView();
        
        $playlistDAL = new \DAL\PlaylistDAL();
        
        $playlistView = new \view\PlaylistView();
        $this->playlists = $this->service->getAllPlaylists();
        if ($this->urlView->clickedSpecificTrack() == true) {
            $track = $this->service->getTrackById($this->urlView->getTrackId());
            return $this->trackView->trackViewHTML($track);
        }
        
        if ($playlistView->clickedAddTrack()) {
            $track = $playlistView->createTrackModel();
            if ($playlistView->createTrackModel()) {
                $this->service->addTrack($track);
            }
        } 
        
        if ($this->urlView->clickedDeleteTrack()) {
            $this->service->deleteTrack($this->urlView->getTrackId());
        }
        if($this->urlView->clickedSpecificPlaylist() == true){
            $pl = $this->service->getPlaylistById($this->urlView->getPlaylistId());
            return $playlistView->playlistViewHTML($pl);
        }
        if ($this->playlistListView->clickedAddPlaylist()) {
            $playlist = $this->playlistListView->createPlaylistModel();
            $this->service->addPlaylist($playlist);
        }
        if ($this->urlView->clickedDeletePlaylist()) {
            $this->service->deletePlaylist($this->urlView->getPlaylistId());
        }
        
        // couldnt figure out a better place to put this at the moment. 
        $playlistDAL->close();
        
        return $this->playlistListView->playlistListViewHTML($this->playlists);
    }
    

}