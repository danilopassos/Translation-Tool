<?php

require_once 'core/DialogoTraducao.php';
require_once 'core/DialogoOriginal.php';

if (isset($_GET["tradu"])) {
    $o = new DialogoTraducao();
    $o->setDialogoUtf8($_GET["tradu"]);
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

    $o = new DialogoOriginal($arc, $msbt, $pos, $lang);
    
    if($modo == "html"){
        echo "<div class=\"htmlpreview\">" . $o->getDialogoHtml() . "</div>";
    
    }
    if($modo == "tag"){
        echo "<pre>" . $o->getDialogoUtf8() . "</pre>";
    }
    
}
?>
