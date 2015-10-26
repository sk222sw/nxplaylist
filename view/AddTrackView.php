<?php

namespace view;

class AddTrackView {
    
    private static $title = "Title";
    private static $url = "URL";
    
    public function InputHTML(){
        return '
			<form method="post"> 
				<label for="' . self::$title . '">'. self::$title .' :</label>
				<input type="text" id="' . self::$title . '" name="' . self::$title . '" value="" />
				
				<label for="' . self::$url . '">'. self::$url .' :</label>
				<input type="text" id="' . self::$url . '" name="' . self::$urle . '" value="" />		
				
				<input type="submit" name="' . self::$add . '" value="Add" />
			</form>                
        '
    }
    
}