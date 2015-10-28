<?php

namespace view;


/////////////////
// CLASS RESPONSIBILITY:
// return HTML concerning a selected track

/////////////////
//dependencies: 
//  \model\Track

class TrackView {
    
    public function trackViewHTML($track) {
        return '
            <h2>'.$track->getTitle().'</h2>
            <a href="?pl='.$track->getPlaylistId().'&trackdel='. $track->getId() .'">Delete track</a>
            <div>
                '.$this->embedHTML($track->getUrl()).'  
            </div>
        ';
    }
    
    private function embedHTML($url) {
        return '
            <iframe id="ytplayer" frameborder="0" type="text/html" width="640" height="390"
            src="https://www.youtube.com/embed/'.$url.'?autoplay=1&color=white&controls=1&disablekb=0&rel=0" />          
        ';
    }
    
}