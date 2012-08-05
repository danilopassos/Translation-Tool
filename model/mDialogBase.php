<?php

//[dialog_lang_id]
//[dialog_id]
//[lang_id]
//[dialog_status_id]
//[dialog_rev_id] 
//[dialog_hist_id] 
//[dialog]
//[version]
//[comment]
//[last_updated]


require_once 'db/dbConnection.php';
class mDialogBase extends dbConnection{
    
    private $dialogLangId;
    private $dialogId;
    private $langId;
    private $dialogStatusId;
    private $arc;
    private $msbt;
    private $name;
    private $dialogTagHex;
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
    
//    //position of dialog on msbt container
//    public function getPos(){
//        $pos = $this->dialogMultiLangId;
//        while (strlen($pos) < 3) {
//            $pos = "0" . $pos;
//        }
//        return $pos;
//    }
//    
//    public function setPos($pos){
//        $this->dialogMultiLangId = (int)$pos;
//    }

    
    public function getLangId(){
        return $this->langId;
    }
    
    public function setLangId($langId){
        $this->langId = $langId;
    }
    
    public function getLang(){
    //    return $this->langId;
    }
    
    public function setLang($lang){
     
        $tt_lang = array(
            array('lang_id' => '1','lang_name' => 'en_US'),
            array('lang_id' => '2','lang_name' => 'es_US'),
            array('lang_id' => '3','lang_name' => 'fr_US'),
            array('lang_id' => '4','lang_name' => 'it_IT'),
            array('lang_id' => '5','lang_name' => 'de_DE'),
            array('lang_id' => '6','lang_name' => 'ja_JP'),
            array('lang_id' => '7','lang_name' => 'pt_BR')
        );
        
        $this->langId = 1;
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
    
    public function getDialogTagHex(){
        return $this->dialogTagHex;
    }
    
    public function setDialogTagHex($DialogTagHex){
        $this->dialogTagHex = $DialogTagHex;
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
