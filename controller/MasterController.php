<?php

/////////////////
// CLASS RESPONSIBILITY:
// master controller - handle app main functionality

/////////////////
//dependencies: 
// \view\MainView
// \view\UrlView
// \controller\PlaylistController
// \other\SessionHandler

namespace controller;

require_once("other/SessionHandler.php");
require_once("view/MainView.php");
require_once("view/UrlView.php");
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
        
        $content;
        
        if ($this->urlView->clickedPlaylists()) {
            
            $content = $playlistController->playlistAction();
            
        } else if ($this->urlView->clickedSpecificPlaylist()) {
            
            $content = $playlistController->playlistAction();
            
        } else if ($this->urlView->clickedSpecificTrack()) {

            $content = $playlistController->playlistAction();

        } else {
            $content = $mainView->welcomeHTML();
        }
        
        $mainView->renderPage($content);
    }
    
}