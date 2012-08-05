<?php

require_once 'core/Dialog.php';

if (isset($_GET["tag"])) {
    $o = new Dialog();
    $o->setDialogTag($_GET["tag"]);
    echo $o->getDialogHtml();
}

$modo="html";
if(isset($_GET["modo"])){
    $modo = $_GET["modo"];
}

if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];
    $lang = $_GET["lang"];

    $sql="SELECT tt_dialog_lang.dialog `dialogTagHex`
     FROM tt_dialog_lang 
inner join tt_lang on (tt_dialog_lang.lang_id = tt_lang.lang_id) 
    WHERE tt_lang.lang_name = '" .$lang . "'  and tt_dialog_lang.dialog_id=" . $id;
    $o = new Dialog();
    $ret = $o->runSelect($sql);
    $o->setDialogTagHex( $ret[0]['dialogTagHex'] );
    if($modo == "html"){
        echo $o->getDialogTagHex();
    }
    
    if($modo == "tag"){
        if(isset($_GET['nopre'])){
            echo $o->getDialogTagHex();
        }else{
            echo "<pre>" . $o->getDialogTagHex() . "</pre>";
        }
    }
    
}
?>
