<?php
require_once 'db/dbConnection.php';
require_once 'core/util.php';

abstract class mFormat extends dbConnection {
    private $hex;
    private $tag;
    private $html;
    
    public function getHex(){
        return $this->hex;
    }
    
    public function setHex($hex){
        $this->hex = $hex;
    }
    
    public function getTag(){
        return $this->tag;
    }
    
    public function setTag($tag){
        $this->tag = $tag;
    }
    
    public function getHTML(){
        return $this->html;
    }
    
    public function setHTML($html){
        $this->html = $html;
    }
        
}
?>
