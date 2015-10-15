<?php

namespace view;

// CLASS RESPONSIBILITY:
// view for adding playlist HTML
class AddPlaylistView {
    public function playlistInputHTML() {
        return '
            <h2>New playlist</h2>
			<form method="post"> 
				<fieldset>
					<label for="">Title</label>
					<input type="text" name="" value="" />
					<input type="submit" name="" value="Create" />
				</fieldset>
			</form>
        ';
    }
}