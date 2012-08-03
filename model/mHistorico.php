<?php

require_once 'model/mDialogo.php';

/**
 * Description of mHistorico
 *
 * @author Adriano
 */
class mHistorico extends dbConnection{
    private $idUsuario;
    private $idDialogo;
    private $quando;
    private $dialogoBase64;
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    
    public function getIdDialogo(){
        return $this->idDialogo;
    }
    public function setIdDialogo($idDialogo){
        $this->idDialogo = $idDialogo;
    }
    
    public function getQuando(){
        return $this->quando;
    }
    public function setQuando($quando){
        $this->quando = $quando;
    }
    
    public function getDialogoBase64(){
        return $this->dialogoBase64;
    }
    
    public function setDialogoBase64($dialogoBase64){
        $this->dialogoBase64 = $dialogoBase64;
    }
}

?>
