<?php
require_once 'core/Dialog.php';
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
$id = $_GET["id"];


if($a == "u"){
    $utf8 = $_GET["utf8"];
    $d = new Dialog();
    $d->setDialogId($id);
    $d->setDialogTag($utf8);
    $d->updateDialog();
    echo "ok";
}


if($a == "Approved"){
    $d = new Dialog();
    $d->setDialogId($id);
    $d->updateDialogApproved();
    echo "Approved";
}

if($a == "Rejected"){
    $d = new Dialog();
    $d->setDialogId($id);  
    $d->updateDialogRejected();
    echo "Rejected";
}

?>
