<?php
require_once 'model/mDicionario.php';

class aDicionario extends mDicionario{
    protected $sqlInsert = "INSERT INTO dicionario(chave , valor) VALUES ('%s', '%s')";
    protected $sqlUpdate = "";
    protected $sqlSelect = "SELECT * FROM dicionario";
    protected $sqlDelete = "delete from dicionario where chave='%s' ";

    public function insert(){
        $sql= sprintf($this->sqlInsert, $this->getChave(),$this->getValor() ) ;
        return $this->RunQuery($sql);
    }
    
    public function update(){
        
    }
    
    public function select(){
        $sql = $this->sqlSelect;
        return $this->runSelect($sql);
    }
    
    public function delete(){
        $sql= sprintf($this->sqlDelete, $this->getId() ) ;
        return $this->RunQuery($sql);
    }
    
}

?>
