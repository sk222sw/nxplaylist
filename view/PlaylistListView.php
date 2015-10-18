<?php

namespace view;

// CLASS RESPONSIBILITY:
// return playlists as links and stuff in HTML
class PlaylistListView {
    
    private static $title = "Title";
    private static $add = "Add";
    
    public function playlistListViewHTML($playlists) {

        $listHTML = $this->inputHTML();
        
        $listHTML .= "<div><ul>";
        foreach ($playlists as $pl) {
            $listHTML .= '
                <li><a href="?pl='. $pl->getId() .'">'.$pl->getTitle().'</a> ID: '. $pl->getId() .'</li>
            ';
        }
        
        $listHTML .= "</ul></div>";
        
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
    
}