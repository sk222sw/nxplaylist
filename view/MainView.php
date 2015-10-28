<?php

namespace view;


/////////////////
// CLASS RESPONSIBILITY:
// gather other views and echo to the DOM

/////////////////
//dependencies: 
// \other\SessionHandler

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
            <a href="/">Home</a>
            <a href="?playlists">Playlists</a>
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
        if (isset($_GET['del'])) {
		    header("Location: /?playlists");
		    exit();     
        }
        if ($_POST) {
		    header("Location: " . $_SERVER['REQUEST_URI']);
		    exit();        
        }
    }
    
    public function welcomeHTML() {
        return '
            <br />
            <p>nxPlaylist lets you gather youtube videos in playlists. Just copy the playlist url to share it with your friends!</p>
            <p>In the future you will be able to gather tracks from different sources, such as youtube, soundcloud and spotify - 
            but right now only youtube works. In the future the next song will auto-play, but as we all know the future isnt here yet
            so you will have to go back and choose a new song yourself. Oh right, there will be CSS in the future, beautiful CSS.</p>
        ';
    }
    
}