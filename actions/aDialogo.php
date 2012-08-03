<?php

require_once 'model/mDialogo.php';
require_once 'core/Usuario.php';

class aDialogo extends mDialogo {

    protected $sqlInsert = "INSERT INTO `dialogo`(`POS`, `ARC`, `MSBT`, `NOME`, `DIALOGO_BASE64`, `LANG`) VALUES ('%s' ,'%s' ,'%s' ,'%s' ,'%s' ,'%s' )";
    #protected $sqlUpdate = "";
    protected $sqlSelect = "SELECT * FROM `dialogo` WHERE ARC='%s' AND MSBT='%s' AND POS='%s' AND LANG='%s'";
    #protected $sqlDelete = "";
    protected $sqlUpdateDialogo = "UPDATE `dialogo` SET `DIALOGO_BASE64`='%s' WHERE `ID`=%s";
    private $sqlHistorico = "INSERT INTO `dialogohistorico`(`IDDIALOGO`, `QUANDO`, `IDUSUARIOALTEROU`, `DIALOGOANTIGO`) VALUES ( %s, NOW() , %s , '%s' )";
    private $sqlRevisao = "INSERT INTO `dialogorevisadopor`(`IDDIALOGO`, `IDUSUARIO`, `QUANDO`) VALUES ( %s, %s, NOW() )";

    public function updateDialogo(){
        $sql = sprintf($this->sqlUpdateDialogo, $this->getDialogoBase64(), $this->getId());
        $this->RunQuery($sql);
        
        $sqlH = sprintf($this->sqlHistorico,$this->getId(), Usuario::getId() ,$this->getDialogoBase64() );
        $this->RunQuery($sqlH);
    }
    public function marcarRevisado(){
        $sql = sprintf($this->sqlRevisao, $this->getId(), Usuario::getId() );
        $this->RunQuery($sql);
    }

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getPosicao(), $this->getArc(), $this->getMsbt(), $this->getNome(), $this->getDialogoBase64(), $this->getLang());

        return $this->RunQuery($sql);
    }

    #public function update(){
    #    
    #}

    protected function get($arc, $msbt, $pos, $lang) {
        $sql = sprintf($this->sqlSelect, $arc, $msbt, $pos, $lang);

        $r = $this->runSelect($sql);
        foreach ($r as $row) {
            $this->setId($row["ID"]);
            $this->setArc($row["ARC"]);
            $this->setMsbt($row["MSBT"]);
            $this->setPosicao($row["POS"]);
            $this->setNome($row["NOME"]);
            $this->setDialogoBase64($row["DIALOGO_BASE64"]);
            $this->setLang($row["LANG"]);
        }
    }
    public static function getArray($msbt, $lang) {
    $sql = sprintf("SELECT * FROM `dialogo` WHERE MSBT='%s' AND LANG='%s'", $msbt, $lang);
    
    $st = new aDialogo();
    $r = $st->runSelect($sql);
    $ret = array();
    foreach ($r as $row) {
        $o = new aDialogo();
        $o->setId($row["ID"]);
        $o->setArc($row["ARC"]);
        $o->setMsbt($row["MSBT"]);
        $o->setPosicao($row["POS"]);
        $o->setNome($row["NOME"]);
        $o->setDialogoBase64($row["DIALOGO_BASE64"]);
        $o->setLang($row["LANG"]);
        array_push($ret, $o);
    }
    return $ret;
}
    
       
    public function isRevisado() {
        $sql = sprintf("SELECT * FROM `dialogorevisadopor` WHERE `IDDIALOGO`='%s'", $this->getId());

        $r = $this->runSelect($sql);
        $ret = false;
        foreach ($r as $row) {
            $ret = true;
        }
        
        return $ret;
    }

    #public function delete(){
    #    
    #}
}

?>
