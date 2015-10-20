<?php

namespace controller;

require_once("other/SessionHandler.php");
//req views
require_once("view/MainView.php");
require_once("view/UrlView.php");
//req models
require_once("model/Playlist.php");
//req controllers
require_once("PlaylistController.php");



class MasterController {
    
    private $playlistController;
    
    public function __construct() {
        $this->playlistController = new \controller\PlaylistController();
        $this->urlView = new \view\UrlView();
    }
    
    public function run() {
        $mainView = new \view\MainView();
        $playlistController = new \controller\PlaylistController();
        
        if ($this->urlView->clickedPlaylists()) {
            $content = $playlistController->playlistAction();
        } else if ($this->urlView->clickedSpecificPlaylist()) {
            $content = $playlistController->playlistAction();
        } else {
            $content = "<h1>Yo!</h1>";
        }
        
        $mainView->renderPage($content);
    }
    
}