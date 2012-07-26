<?php
require_once 'actions/aFormatacao.php';

class Formatacao extends aFormatacao{
    
    public function __construct($hex) {
        $this->setHex($hex);
        $this->select();
    }
   
    
}
?>
