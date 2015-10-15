<?php

namespace view;

// CLASS RESPONSIBILITY:
// return playlists as links and stuff in HTML
class PlaylistView {
    
    public function playlistViewHTML($playlists) {
        $listHTML = "<ul>";
        
        foreach ($playlists as $pl) {
            $listHTML .= '
                <li><a href="#">'.$pl->getTitle().'</a></li>
            ';
        }
        
        $listHTML .= "</ul>";
        
        return $listHTML;
    }
    
}