<?php

namespace view;

class PlaylistView {
    public function playlistViewHTML(\model\Playlist $pl) {
        return '
            <h1>'.$pl->getTitle().'</h1>
            <a href="?playlists&del='. $pl->getId() .'">Delete</a>
        ';
    }
}