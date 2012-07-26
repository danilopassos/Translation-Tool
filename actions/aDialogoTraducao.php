<?php

require_once 'model/mDialogoTraducao.php';

class aDialogoTraducao extends mDialogoTraducao {

    protected $sqlInsert = "INSERT INTO `dialogotraducao`(`ARC`, `MSBT`, `POS`, `CRIADOR`, `PONTOS`, `DIALOGO_BASE64`) VALUES ('%s','%s','%s','%s','%s','%s')";
    #protected $sqlUpdate = "";
    protected $sqlSelect = "SELECT * FROM `dialogotraducao` WHERE ARC='%s' AND MSBT='%s' AND POS='%s' ORDER BY  `dialogotraducao`.`ID` DESC";
    protected $sqlDelete = "DELETE FROM `dialogotraducao` WHERE `ID`=%s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getArc(), $this->getMsbt(),$this->getPosicao() ,  
                $this->getCriador(),$this->getPontos(),$this->getDialogoBase64());
    
        return $this->RunQuery($sql);
    }

    #public function update(){
    #    
    #}
    
        public function get($arc, $msbt, $pos) {
        $sql = sprintf($this->sqlSelect, $arc, $msbt, $pos);

        $r = $this->runSelect($sql);
        $o = new DialogoTraducao();
        foreach ($r as $row) {
            $o->setId($row["ID"]);
            $o->setArc($row["ARC"]);
            $o->setMsbt($row["MSBT"]);
            $o->setPosicao($row["POS"]);
            $o->setCriador($row["CRIADOR"]);
            $o->setPontos($row["PONTOS"]);
            $o->setDialogoBase64($row["DIALOGO_BASE64"]);
        }
        
        return $o;
    }
    
    public function getTodas($arc, $msbt, $pos) {
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
            $o->setPontos($row["PONTOS"]);
            $o->setDialogoBase64($row["DIALOGO_BASE64"]);
            array_push($todas, $o);
        }
        
        return $todas;
    }

    public function delete(){
        $sql = sprintf($this->sqlDelete, $this->getId());
        echo $sql;
        return $this->RunQuery($sql);    
    }
}

?>
