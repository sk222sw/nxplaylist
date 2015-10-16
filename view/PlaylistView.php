<?php

namespace view;

class PlaylistView {
    public function playlistViewHTML($title) {
        return '
            <h1>'.$title.'</h1>
        ';
    }
}