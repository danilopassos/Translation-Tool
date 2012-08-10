<?php
require_once(dirname(__FILE__) .'/../actions/aFormat.php');

class Format extends aFormat{
    
    public function __construct($hex) {
        $this->setHex($hex);
        $this->select();
    }
   
    
}
?>
