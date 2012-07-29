<?php

require_once 'model/mDialogoTraducao.php';
require_once 'core/Usuario.php';

class aDialogoTraducao extends mDialogoTraducao {

    protected $sqlInsert = "INSERT INTO `dialogotraducao`(`ARC`, `MSBT`, `POS`, `CRIADOR`, `DIALOGO_BASE64` , `CRIADOEM`) VALUES ('%s','%s','%s','%s','%s', NOW())";
    protected $sqlUpdateDialogo = "UPDATE `dialogotraducao` SET `DIALOGO_BASE64`='%s',CRIADOEM=NOW() WHERE `ID`=%s";
    protected $sqlSelect = "SELECT * FROM `dialogotraducao` WHERE ARC='%s' AND MSBT='%s' AND POS='%s' ORDER BY  `dialogotraducao`.`ID` DESC";
    protected $sqlSelectAMelhor = "SELECT * FROM `dialogotraducao` WHERE ARC='%s' AND MSBT='%s' AND POS='%s' ORDER BY `PONTOS`";
    protected $sqlDelete = "DELETE FROM `dialogotraducao` WHERE `ID`=%s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getArc(), $this->getMsbt(),$this->getPosicao() ,  
        $this->getCriador(),$this->getPontos(),$this->getDialogoBase64());
        $this->RunQuery($sql);
    }

    public function updateDialogo(){
        $sql = sprintf($this->sqlUpdateDialogo, $this->getDialogoBase64(), $this->getId());
        $this->RunQuery($sql);
    }
    
    protected function getAMelhor($arc, $msbt, $pos) {
        $sql = sprintf($this->sqlSelectAMelhor, $arc, $msbt, $pos);

        $r = $this->runSelect($sql);
        $o = new DialogoTraducao();
        foreach ($r as $row) {
            $o->setId($row["ID"]);
            $o->setArc($row["ARC"]);
            $o->setMsbt($row["MSBT"]);
            $o->setPosicao($row["POS"]);
            $o->setCriador($row["CRIADOR"]);

            $o->setDialogoBase64($row["DIALOGO_BASE64"]);
            $o->setCriadoEm($row["CRIADOEM"]);
        }

        return $o;
    }
    
    protected function getTodas($arc, $msbt, $pos) {
        $sql = sprintf($this->sqlSelect, $arc, $msbt, $pos);

        $r = $this->runSelect($sql);
        $todas = array();
        foreach ($r as $row) {
            $o = new DialogoTraducao();
            $o->setId($row["ID"]);
            $o->setArc($row["ARC"]);
            $o->setMsbt($row["MSBT"]);
            $o->setPosicao($row["POS"]);
            $o->setCriador($row["CRIADOR"]);

            $o->setDialogoBase64($row["DIALOGO_BASE64"]);
            $o->setCriadoEm($row["CRIADOEM"]);
            array_push($todas, $o);
        }
        
        return $todas;
    }

    public function delete(){
        $sql = sprintf($this->sqlDelete, $this->getId());
        $this->RunQuery($sql);    
    }
   
    
}

?>
