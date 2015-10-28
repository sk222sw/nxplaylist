<?php

namespace other;

/////////////////
// CLASS RESPONSIBILITY:
// handle sessions. however this is not fully implemented
// in the rest of the application, so now it basically just 
// starts a new session if there is none

/////////////////
//dependencies: 
// liberated from dependencies

class SessionHandler {
    
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function setMessage($value) {
        $_SESSION["flashMessage"] = $value;
    }

    public function getTempData() {
        if (isset($_SESSION['flashMessage'])) {
            $value = $_SESSION['flashMessage'];
            unset($_SESSION['flashMessage']);
            return $value;
        }
    }
    
}