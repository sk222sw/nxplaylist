<?php

namespace other;

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