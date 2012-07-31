<?php

require_once 'actions/aDialogo.php';

class Dialogo extends aDialogo {

    function __construct($arc = null, $msbt = null, $pos = null, $lang = null, $autoCaregarDialogo = true) {
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