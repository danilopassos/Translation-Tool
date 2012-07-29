<?php

require_once 'model/mDialogo.php';

class mDialogoTraducao extends mDialogo{
    
    protected $id; //numero da tradução para o dialogo
    protected $criador;//usuario que a criou
    protected $criadoEm;
    
    public function getCriadoEm(){
        return $this->criadoEm;
    }
    
    public function setCriadoEm($value){
        $this->criadoEm = $value;
    }

    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getCriador(){
        return $this->criador ;
    }
    
    public function setCriador($user){
        $this->criador = $user;
    }
    
    public function getPontos(){
        return $this->pontos ;
    }
    
    public function setPontos($pontos){
        $this->pontos = $pontos;
    }
}

?>
