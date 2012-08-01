<?php
require_once 'core/Dialogo.php';
/*
 * valores para "a"
 * i - inserte, salvar tradução
 * d - delete
 * 
 * 
 */

if (isset($_GET["a"])){
    $a = $_GET["a"];
}else{
    die("not a");
}


$arc = $_GET["arc"]; 
$msbt = $_GET["msbt"]; 
$pos = $_GET["pos"];


if($a == "u"){
    $utf8 = $_GET["utf8"];
    $d = new Dialogo($arc, $msbt , $pos , "pt_BR");
    $d->setDialogoUtf8($utf8);
    $d->updateDialogo();
    echo "ok";
}

//revisao
if($a == "r"){
    $arc = $_GET["arc"];
    $msbt = $_GET["msbt"];
    $pos = $_GET["pos"];
    $lang = $_GET["lang"];

    $o = new Dialogo($arc, $msbt, $pos, $lang);
    
    $o->marcarRevisado();
    
    echo "marcado como revisado";
}

if($a == "d"){
    $id = $_GET["id"];   
    $d = new DialogoTraducao();
    $d->setId($id);
    $d->delete();
    echo "ok";
}

?>
