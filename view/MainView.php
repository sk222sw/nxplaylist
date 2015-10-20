<?php

namespace view;

// CLASS RESPONSIBILITY:
// gather other views and echo it to the DOM
class MainView {
    
    public function __construct() {
        $this->session = new \other\SessionHandler();
    }
    
    public function renderPage($content) {
        $this->reload();
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
    
    private function message() {
        $message = "";
        if (isset($_SESSION['flashMessage'])) {
            switch ($_SESSION['flashMessage']) {
                case "playlistAdded":
                    $message = "Playlist added!";
                    break;
                default:
                    $message = "";
                    break;            
            }
            unset($_SESSION['flashMessage']);
        }   
        return $message;
    }

    private function reload() {
        if ($_POST) {
		    header("Location: " . $_SERVER['REQUEST_URI']);
		    exit();        
        }
    }
    
}