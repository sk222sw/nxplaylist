<?php

namespace view;

// for viewing a selected playlist and adding tracks to the playlist

class PlaylistView {
    
    private static $title = "Title";
    private static $url = "URL";
    private static $add = "AddTrack";
    
    private static $flashTitleTooShort = "titleTooShort";
    private static $flashTitleTooLong = "titleTooLong";
    private static $flashInvalidCharacters = "invalidCharacters";    
    private static $flashInvalidURL = "invalidURL";    
    private static $flashTrackAdded = "trackAdded";
    private static $flashDeleted = "trackDeleted";
    
    private static $trackAdded = "Track added!";
    private static $titleTooShort = "Title must be longer than 2 characters";
    private static $titleTooLong = "Title must be shorter than 50 characters";
    private static $invalidCharacters = "Title can be numbers, letters and _ -";
    private static $invalidURL = "URL is invalid";
    private static $trackDeleted = "Track deleted.";    
    
    public function playlistViewHTML(\model\Playlist $pl) {
        return '
            <h1>'.$pl->getTitle().'</h1>
            <div>
                <a href="?playlists&del='. $pl->getId() .'">Delete playlist</a>
            </div>
            <div>Add new track (only youtube URL:s are valid at this moment): </div>
            <div>'.$this->showMessage().'</div>
            <div>'. $this->trackInputHTML() .'</div>
            <div>'.
                $this->getTracks($pl)
            .'</div>
        ';
    }
    
    private function getTracks($pl) {
        $tracklistHTML = "<ul>";

        foreach ($pl->getTracks() as $track) {
            $tracklistHTML .= $this->trackHTML($track);
        }

        $tracklistHTML .= "</ul>";

        return $tracklistHTML;
    }
    
    private function trackHTML($track) {
        return '
            <li>
                <a href="?tr='.$track->getId().'">'.$track->getTitle().'</a>
            </li>
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
    
    // https://halgatewood.com/php-get-the-youtube-video-id-from-a-youtube-url
    function getYouTubeIdFromURL($url) {
        $url_string = parse_url($url, PHP_URL_QUERY);
        parse_str($url_string, $args);
        return isset($args['v']) ? $args['v'] : false;
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
        
        if ($this->validate($title)) {
            $track = new \model\Track(0, $playlistId, $title, $url);
            return $track;
        }
        return false;
    }
    
    private function getTitle() {
        if (isset($_POST[self::$title])) {
            return $_POST[self::$title];
        }
    }
    
    private function getUrl() {
        if (isset($_POST[self::$url])) {
            $yUrl = $this->getYouTubeIdFromURL($_POST[self::$url]);
            return $yUrl;
        }
    }
    
    private function getPlaylistId() {
        return $_GET["pl"];
    }
    
    private function showMessage() {
        if (!$_POST) {
            return $this->getMessage();   
        }
    }    
    
    private function getMessage() {
        $message = "";
        if (isset($_SESSION['flashMessage'])) {
            switch ($_SESSION['flashMessage']) {
                case self::$flashTrackAdded:
                    $message = self::$trackAdded;
                    break;
                case self::$flashTitleTooShort:
                    $message = self::$titleTooShort;
                    break;
                case self::$flashTitleTooLong:
                    $message = self::$titleTooLong;
                    break;
                case slef::$flashInvalidCharacters:
                    $message = self::$invalidCharacters;
                    break;
                case self::$flashDeleted:
                    $message = self::$trackDeleted;
                    break;      
                case self::$flashInvalidURL:
                    $message = self::$invalidURL;
                default:
                    break;
            }
        }
        unset($_SESSION['flashMessage']);
        return $message;
    }    
    
}