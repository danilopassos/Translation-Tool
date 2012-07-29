<?php

require_once 'actions/aDialogoTraducao.php';
require_once 'core/Usuario.php';
class DialogoTraducao extends aDialogoTraducao{
    
    public static function getMelhorTradução($arc, $msbt, $pos){
        $o = new DialogoTraducao();
        $o = $o->getAMelhor($arc, $msbt, $pos);
        return $o;
    }
    
    public static function getTodasTradução($arc, $msbt, $pos){
        $o = new DialogoTraducao();
        return $o->getTodas($arc, $msbt, $pos);
    }
    
    public function possoVotar(){
//        if ($this->getCriador() == Usuario::getName()){
//            return false;
//        }
        
        $sql = "SELECT COUNT(`USUARIO`) as NR FROM javotou WHERE `IDDIALOGO`=%s AND USUARIO='%s'" ;
        $sql = sprintf($sql, $this->getId(), Usuario::getName()  );

        $r = $this->runSelect($sql);
        $i="0";
        foreach ($r as $row) {
            $i = $row["NR"] ;
        }
        
        return $i == "0";
    }

 
    
    
    public function possoEditar(){
        if(Usuario::isAdmin()){
            return true;
        }
        
        return $this->getCriador() == Usuario::getName() ;
    }
    
}
?>
