<?php

require_once 'core/Dialogo.php';

if (isset($_GET["tag"])) {
    $o = new Dialogo();
    $o->setDialogoUtf8($_GET["tag"]);
    echo $o->getDialogoHtml();
}

$modo="html";
if(isset($_GET["modo"])){
    $modo = $_GET["modo"];
}

if ( isset($_GET["pos"]) ) {
    $arc = $_GET["arc"];
    $msbt = $_GET["msbt"];
    $pos = $_GET["pos"];
    $lang = $_GET["lang"];

    $o = new Dialogo($arc, $msbt, $pos, $lang);
    
    if($modo == "html"){
        echo $o->getDialogoHtml();
    }
    
    if($modo == "tag"){
        if(isset($_GET['nopre'])){
            echo $o->getDialogoUtf8();
        }else{
            echo "<pre>" . $o->getDialogoUtf8() . "</pre>";
        }
    }
    
}
?>
