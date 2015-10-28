<?php

namespace other;

/////////////////
// CLASS RESPONSIBILITY:
// abstraction class for validation - should probably be abstract

/////////////////
//dependencies: 
// no dependencies

class ValidationHandler {
    
    public function validateLength($s, $min, $max) {
        if (strlen($s) > $max) {
            throw new \Exception("input too long, max: " . $max);
        } else if (strlen($s) < $min) {
            throw new \Exception("input too short, min: " . $min);
        }
    }
    
    public function validateWithRegex($s, $r) {
        if (!preg_match($r, $s) == false) {
            throw new \Exception("invalid input: " . $s);
        }
    }
    
}