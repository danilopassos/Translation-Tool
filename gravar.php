<?php
require_once 'core/DialogoTraducao.php';
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
$user = "adri3d@gmail.com";


if($a == "u"){
    $id = $_GET["id"];
    $utf8 = $_GET["utf8"];
    $d = new DialogoTraducao();
    $d->setId($id);
    $d->setDialogoUtf8($utf8);
    $d->updateDialogo();
    echo "ok";
}

if($a == "i"){
    $utf8 = $_GET["utf8"];
    
    $d = new DialogoTraducao();
    $d->setArc($arc);
    $d->setMsbt($msbt);
    $d->setPosicao($pos);
    $d->setDialogoUtf8($utf8);
    $d->setCriador($user);
    
    $d->insert();
    
    echo "ok";
}
if($a == "d"){
    $id = $_GET["id"];   
    $d = new DialogoTraducao();
    $d->setId($id);
    $d->delete();
    echo "ok";
}

//if (isset($_GET["arc"])) {
//    //echo "<pre>";
//    salvar01($_GET["arc"], $_GET["msbt"], $_GET["pos"],  ( $_GET["utf8"]));
//    
//    $link = "traduzir.php?arc=" . $_GET["arc"] . "&msbt=" . $_GET["msbt"] . "&pos=" . $_GET["pos"] ;
//    //echo "<a href=\"$link\" > Voltar </a>" ;
//    header("location:$link");
//}
?>