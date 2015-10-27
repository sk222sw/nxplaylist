<?php

namespace view;

/////////////////
// CLASS RESPONSIBILITY:
// return playlists as links and stuff in HTML

/////////////////
//dependencies: 
//  \model\Playlist
//  \other\SessionHandler

class PlaylistListView {
    
    private static $title = "Title";
    private static $add = "Add";
    private $message = "";
    
    //possible error/success messages:
    private static $playlistAdded = "Playlist added!";
    private static $titleTooShort = "Title must be longer than 2 characters";
    private static $titleTooLong = "Title must be shorter than 50 characters";
    private static $invalidCharacters = "Title can be numbers, letters, and _ -";
    private static $playlistDeleted = "Playlist deleted.";
    
    //possible flash messages:
    private static $flashTitleTooShort = "titleTooShort";
    private static $flashTitleTooLong = "titleTooLong";
    private static $flashInvalidCharacters = "invalidCharacters";
    
    public function __construct() {
        $this->session = new \other\SessionHandler();
    }
    
    public function playlistListViewHTML($playlists) {
        $listHTML = $this->inputHTML();
        $listHTML .= "
        <div>
            ". $this->showMessage() ."
            <ul>";
            foreach ($playlists as $pl) {
                $listHTML .= '
                    <li>
                        <a href="?pl='. $pl->getId() .'">
                            '.$pl->getTitle().'
                        </a>
                    </li>
                ';
            }
            $listHTML .= "</ul>
        </div>";
        return $listHTML;
    }
    
    public function inputHTML() {
        return '
			<form method="post"> 
					<label for="' . self::$title . '">Title :</label>
					<input type="text" id="' . self::$title . '" name="' . self::$title . '" value="" />
					
					<input type="submit" name="' . self::$add . '" value="Add" />
			</form>            
        ';
    }
    
    public function clickedAddPlaylist() {
        return isset($_POST[self::$title]);
    }
    
    public function getPostTitle() {
        if (isset($_POST[self::$title])) {
            return $_POST[self::$title];
        }
    }
    
    public function createPlaylistModel() {
        $title = $this->getPostTitle();

        if ($this->validate($title)) {
            $pl = new \model\Playlist($title);
            $pl->save();
        }

    }

    private function getMessage() {
        $message = "";
        if (isset($_SESSION['flashMessage'])) {
            switch ($_SESSION['flashMessage']) {
                case "playlistAdded":
                    $message = self::$playlistAdded;
                    break;
                case self::$flashTitleTooShort:
                    $message = self::$titleTooShort;
                    break;
                case "titleTooLong":
                    $message = self::$titleTooLong;
                    break;
                case "invalidCharacters":
                    $message = self::$invalidCharacters;
                    break;
                case "playlistDeleted":
                    $message = self::$playlistDeleted;
                    break;                    
                default:
                    $message = "";
                    break;
            }
        }
        unset($_SESSION['flashMessage']);
        return $message;
    }
    
    private function validate($stringToValidate) {
        if (strlen($stringToValidate) < 3) {
            $_SESSION['flashMessage'] = self::$flashTitleTooShort;
            return false;
        } else if (strlen($stringToValidate) > 50) {
            $_SESSION['flashMessage'] = self::$flashTitleTooLong;
            return false;
        } 
        else if (!preg_match("/[^-a-z0-9_]/i", $stringToValidate) == false) {
            $_SESSION['flashMessage'] = self::$flashInvalidCharacters;
            return false;
        } 
        return true;
    }
    
    private function showMessage() {
        if (!$_POST) {
            return $this->getMessage();   
        }
    }
    
}