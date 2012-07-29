<?php

require_once 'model/mDialogoOriginal.php';

class aDialogoOriginal extends mDialogoOriginal {

    protected $sqlInsert = "INSERT INTO `dialogo`(`POS`, `ARC`, `MSBT`, `NOME`, `DIALOGO_BASE64`, `LANG`) VALUES ('%s' ,'%s' ,'%s' ,'%s' ,'%s' ,'%s' )";
    #protected $sqlUpdate = "";
    protected $sqlSelect = "SELECT * FROM `dialogo` WHERE ARC='%s' AND MSBT='%s' AND POS='%s' AND LANG='%s'";

    #protected $sqlDelete = "";

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
            $this->setArc($row["ARC"]);
            $this->setMsbt($row["MSBT"]);
            $this->setPosicao($row["POS"]);
            $this->setNome($row["NOME"]);
            $this->setDialogoBase64($row["DIALOGO_BASE64"]);
            $this->setLang($row["LANG"]);
        }
    }

    #public function delete(){
    #    
    #}
}

?>
