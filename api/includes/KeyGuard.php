<?php

class KeyGuard {
    private $Salt = "KG";
    public function __construct(){}

    public function getHash($value){
        $hashed_string = hash("sha256", $value.$this->Salt);
        return $hashed_string;
    }

    public function verifyHash($string, $hash){
        if($this->getHash($string) === $hash){
            return true;
        }else{
            return false;
        }
    }
}

?>