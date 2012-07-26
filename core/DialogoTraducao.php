<?php

require_once 'actions/aDialogoTraducao.php';

class DialogoTraducao extends aDialogoTraducao{
    
    public static function getMelhorTradução($arc, $msbt, $pos){
        $o = new DialogoTraducao();
        $o = $o->get($arc, $msbt, $pos);
        return $o;
    }
    
    public static function getTodasTradução($arc, $msbt, $pos){
        $o = new DialogoTraducao();
        return $o->getTodas($arc, $msbt, $pos);
    }
}
?>
