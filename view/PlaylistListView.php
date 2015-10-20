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
    
    private static $playlistAdded = "Playlist added!";
    
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
        return new \model\Playlist($title);
    }
    
    private function getMessage() {
        $message = "";
        if (isset($_SESSION['flashMessage'])) {
            switch ($_SESSION['flashMessage']) {
                case "playlistAdded":
                    $message = self::$playlistAdded;
                    break;
                
                default:
                    // code...
                    break;
            }
        }
        unset($_SESSION['flashMessage']);
        return $message;
    }
    
    private function showMessage() {
        if (!$_POST) {
            return $this->getMessage();   
        }
    }
    
}