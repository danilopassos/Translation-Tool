<?php
require_once(dirname(__FILE__) . '/../db/dbConnection.php');

class mDialogBase extends dbConnection{
    
    private $dialogLangId;
    private $dialogId;
    private $langId;
    private $dialogStatusId;
    private $arc;
    private $msbt;
    private $pos;
    private $name;
    private $dialogTag;
    private $version;
    private $comment;
    private $lastUpdated;
    
    public function getDialogId(){
        return $this->dialogId;
    }
    
    public function setDialogId($dialogId){
        $this->dialogId = $dialogId;
    }
    
    public function getDialogLangId(){
        return $this->dialogLangId;
    }
    
    public function setDialogMultiLangId($dialogLangId){
        $this->dialogLangId = $dialogLangId;
    }
    
    //position of dialog on msbt container
    public function getPos(){
        $pos = $this->pos;
        while (strlen($pos) < 3) {
            $pos = "0" . $pos;
        }
        return $pos;
    }
    
    public function setPos($pos){
        $this->pos = $pos;
    }

    
    public function getLangId(){
        return $this->langId;
    }
    
    public function setLangId($langId){
        $this->langId = $langId;
    }
    
    public function getLang(){
        return Lang::getLangName($this->langId);
    }
    
    public function setLang($lang){
        $this->langId = Lang::getId($lang);
    }
    
    public function getDialogStatusId(){
        return $this->dialogStatusId;
    }
    
    public function setDialogStatusId($dialogStatusId){
        $this->dialogStatusId = $dialogStatusId;
    }
    
    public function getArc(){
        return $this->arc;
    }
    
    public function setArc($arc){
        $this->arc = $arc;
    }
    
    public function getMsbt(){
        return $this->msbt;
    }
    
    public function setMsbt($msbt){
        $this->msbt = $msbt;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function getDialogTag(){
        return $this->dialogTagHex;
    }
    
    public function setDialogTag($DialogTag){
        $this->dialogTagHex = $DialogTag;
    }
    
    public function getVersion(){
        return $this->version;
    }
    
    public function setVersion($version){
        $this->version = $version;
    }
    
    public function getComment(){
        return $this->comment;
    }
    
    public function setComment($comment){
        $this->comment = $comment;
    }
    
    public function getLastUpdated(){
        return $this->lastUpdated;
    }
    
    public function setLastUpdated($lastUpdated){
        $this->lastUpdated = $lastUpdated;
    }
    
}

?>
