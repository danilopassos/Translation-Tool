<?php

require_once 'model/mDialog.php';

class aDialog extends mDialog {
   
//#    protected $sqlInsert = "INSERT INTO tt_dialog(`POS`, `ARC`, `MSBT`, `NOME`, `DIALOGO_BASE64`, `LANG`) VALUES ('%s' ,'%s' ,'%s' ,'%s' ,'%s' ,'%s' )";
       protected $sqlUpdate = "UPDATE `tt_dialog_lang` SET `dialog` = '%s',`dialog_status_id` = 2,`last_updated`= now() WHERE `lang_id`= 7 and `version` = 'last' and `dialog_id` = '%s'";
       protected $sqlUpdateDialogApproved = "UPDATE `tt_dialog_lang` SET `dialog_status_id` = 4,`last_updated`= now() WHERE `lang_id`= 7 and `version` = 'last' and `dialog_id` = '%s'";
       protected $sqlUpdateDialogRejected = "UPDATE `tt_dialog_lang` SET `dialog_status_id` = 5,`last_updated`= now() WHERE `lang_id`= 7 and `version` = 'last' and `dialog_id` = '%s'";
//  #  
//  protected $sqlSelect = "SELECT * FROM `dialogo` WHERE arc='%s' AND msbt='%s' AND dialog_multi_lang_id=%s AND lang_id=%s";
//    #protected $sqlDelete = "";
// #   protected $sqlUpdateDialogo = "UPDATE `dialogo` SET `DIALOGO_BASE64`='%s' WHERE `ID`=%s";
// #   private $sqlHistorico = "INSERT INTO `dialogohistorico`(`IDDIALOGO`, `QUANDO`, `IDUSUARIOALTEROU`, `DIALOGOANTIGO`) VALUES ( %s, NOW() , %s , '%s' )";
// #   private $sqlRevisao = "INSERT INTO `dialogorevisadopor`(`IDDIALOGO`, `IDUSUARIO`, `QUANDO`) VALUES ( %s, %s, NOW() )";
//
//    public function updateDialogo(){
//        $sql = sprintf($this->sqlUpdateDialogo, $this->getDialogoBase64(), $this->getId());
//        $this->RunQuery($sql);
//        
//        $sqlH = sprintf($this->sqlHistorico,$this->getId(), Usuario::getId() ,$this->getDialogoBase64() );
//        $this->RunQuery($sqlH);
//    }
//    public function marcarRevisado(){
//        $sql = sprintf($this->sqlRevisao, $this->getId(), Usuario::getId() );
//        $this->RunQuery($sql);
//    }
//
//    public function insert() {
//        $sql = sprintf($this->sqlInsert, $this->getPosicao(), $this->getArc(), $this->getMsbt(), $this->getNome(), $this->getDialogoBase64(), $this->getLang());
//
//        return $this->RunQuery($sql);
//    }
//    
    public function updateDialog() {
        $sql = sprintf($this->sqlUpdate, $this->getDialogTagHex(), $this->getDialogId());
        $this->RunQuery($sql);
    }
    
    public function updateDialogApproved() {
        $sql = sprintf($this->sqlUpdateDialogApproved,  $this->getDialogId());
        $this->RunQuery($sql);
    }
    
    public function updateDialogRejected() {
        $sql = sprintf($this->sqlUpdateDialogRejected,  $this->getDialogId());
        $this->RunQuery($sql);
    }

//    #public function update(){
//    #    
//    #}
//
//    protected function get($arc, $msbt, $pos, $lang) {
//        $sql = sprintf($this->sqlSelect, $arc, $msbt, (int)$pos, 7 );
//
//        $r = $this->runSelect($sql);
//        foreach ($r as $row) {
//            $this->setId($row["ID"]);
//            $this->setArc($row["arc"]);
//            $this->setMsbt($row["msbt"]);
//            $this->setPosicao($row["POS"]);
//            $this->setNome($row["name"]);
//            $this->setDialogoBase64($row["dialog"]);
//            $this->setLang($row["lang_id"]);
//        }
//    }
//    public static function getArray($msbt, $lang) {
//    $sql = sprintf("SELECT * FROM `dialogo` WHERE MSBT='%s' AND LANG='%s'", $msbt, $lang);
//    
//    $st = new aDialogo();
//    $r = $st->runSelect($sql);
//    $ret = array();
//    foreach ($r as $row) {
//        $o = new aDialogo();
//        $o->setId($row["ID"]);
//        $o->setArc($row["ARC"]);
//        $o->setMsbt($row["MSBT"]);
//        $o->setPosicao($row["POS"]);
//        $o->setNome($row["NOME"]);
//        $o->setDialogoBase64($row["DIALOGO_BASE64"]);
//        $o->setLang($row["LANG"]);
//        array_push($ret, $o);
//    }
//    return $ret;
//}
//    
//       
//    public function isRevisado() {
//        $sql = sprintf("SELECT * FROM `dialogorevisadopor` WHERE `IDDIALOGO`='%s'", $this->getId());
//
//        $r = $this->runSelect($sql);
//        $ret = false;
//        foreach ($r as $row) {
//            $ret = true;
//        }
//        
//        return $ret;
//    }
//
//    #public function delete(){
//    #    
//    #}
}

?>
