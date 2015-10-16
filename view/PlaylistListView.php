<?php

namespace view;

// CLASS RESPONSIBILITY:
// return playlists as links and stuff in HTML
class PlaylistListView {
    
    public function playlistListViewHTML($playlists) {
        $listHTML = "<ul>";
        
        foreach ($playlists as $pl) {
            $listHTML .= '
                <li><a href="?pl='. $pl->getId() .'">'.$pl->getTitle().'</a> ID: '. $pl->getId() .'</li>
            ';
        }
        
        $listHTML .= "</ul>";
        
        return $listHTML;
    }
    
}