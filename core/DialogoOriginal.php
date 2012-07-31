<?php

require_once 'actions/aDialogoOriginal.php';

class DialogoOriginal extends aDialogoOriginal {

    function __construct($arc, $msbt, $pos, $lang, $autoCaregarDialogo = true) {
        if ($autoCaregarDialogo) {
            $this->get($arc, $msbt, $pos, $lang);
        } else {
            $this->setArc($arc);
            $this->setMsbt($msbt);
            $this->setPosicao($pos);
            $this->setLang($lang);
        }
    }
    
    

}

?>