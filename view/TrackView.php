<?php

namespace view;

class TrackView {
    
    public function trackViewHTML($track) {
        return '
            <h2>'.$track->getTitle().'</h2>
            '.$this->embedHTML($track->getUrl()).'
        ';
    }
    
    private function embedHTML($url) {
        return '
            <iframe id="ytplayer" frameborder="0" type="text/html" width="640" height="390"
            src="http://www.youtube.com/embed/'.$url.'?autoplay=1&color=white&controls=1&disablekb=0&rel=0" />          
        ';
    }
    
}