<?php

namespace view;

// for viewing a selected playlist and adding tracks to the playlist

class PlaylistView {
    
    private static $title = "Title";
    private static $url = "URL";
    private static $add = "AddTrack";
    
    public function playlistViewHTML(\model\Playlist $pl) {
        return '
            <h1>'.$pl->getTitle().'</h1>
            <div>
                <a href="?playlists&del='. $pl->getId() .'">Delete</a>
            </div>
    
            <div>'. $this->trackInputHTML() .'</div>
        ';
    }
    
    public function trackInputHTML(){
        return '
			<form method="post"> 
				<label for="' . self::$title . '">'. self::$title .' :</label>
				<input type="text" id="' . self::$title . '" name="' . self::$title . '" value="" />
				
				<label for="' . self::$url . '">'. self::$url .' :</label>
				<input type="text" id="' . self::$url . '" name="' . self::$url . '" value="" />		
				
				<input type="submit" name="AddTrack" value="Add" />
			</form>                
        ';
    }
    
    private function validate($stringToValidate) {
        if (strlen($stringToValidate) < 3) {
            $_SESSION['flashMessage'] = self::$flashTitleTooShort;
            return false;
        } else if (strlen($stringToValidate) > 50) {
            $_SESSION['flashMessage'] = self::$flashTitleTooLong;
            return false;
        } 
        else if (!preg_match("/[^-a-z0-9_() ]/i", $stringToValidate) == false) {
            $_SESSION['flashMessage'] = self::$flashInvalidCharacters;
            return false;
        } 
        return true;
    }    
    
    public function clickedAddTrack() {
        return isset($_POST[self::$add]);
    }
    
    public function createTrackModel() {
        $playlistId = $this->getPlaylistId();
        $title = $this->getTitle();
        $url = $this->getUrl();
        
        $track = new \model\Track($playlistId, $title, $url);
        return $track;
    }
    
    private function getTitle() {
        if (isset($_POST[self::$title])) {
            return $_POST[self::$title];
        }
    }
    private function getUrl() {
        if (isset($_POST[self::$url])) {
            return $_POST[self::$url];
        }
    }
    private function getPlaylistId() {
        return $_GET["pl"];
    }
    
    
}