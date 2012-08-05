<?php
require_once 'actions/aFormat.php';

class Format extends aFormat{
    
    public function __construct($hex) {
        $this->setHex($hex);
        $this->select();
    }
   
    
}
?>
