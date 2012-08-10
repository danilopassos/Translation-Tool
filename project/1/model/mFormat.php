<?php
require_once(dirname(__FILE__) .'/../db/dbConnection.php');
require_once(dirname(__FILE__) .'/../core/util.php');

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
        if(($this->tag == "") || ($this->tag == null)){
            return $this->hex;
        }else{
            return $this->tag;
        
        }
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
