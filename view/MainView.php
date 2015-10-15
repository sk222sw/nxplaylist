<?php

namespace view;

// CLASS RESPONSIBILITY:
// gather other views and echo it to the DOM
class MainView {
    
    public function renderPage($content) {
        echo '
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8" />
            </head>
            <body>
                ' . $this->headerHTML() . '
                ' . $this->navigationHTML() . '
                ' . $this->contentHTML($content) . '
            </body>
            </html>
        ';
        
    }
    
    private function headerHTML() {
        echo '<h1>nxPlaylist</h1>';
    }
    
    private function navigationHTML() {
        echo '
            <a href="?playlists">Playlists</a>
            <a href="/">Home</a>
        ';
    }
    
    private function contentHTML($content) {
        echo $content;
    }
}