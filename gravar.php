<?php

require_once 'core/Dialog.php';
/*
 * valores para "a"
 * i - inserte, salvar tradução
 * d - delete
 * 
 * 
 */

$a = $_GET["a"];
$arc = $_GET["arc"];
$msbt = $_GET["msbt"];
$id = $_GET["id"];


if ($a == "u") {

    if (User::dialogCanChange()) {
        $utf8 = $_GET["utf8"];
        $d = new Dialog();
        $d->setDialogId($id);
        $d->setDialogTag($utf8);
        $d->updateDialog();
        echo "Changed";
    } else {
        echo "permission denied";
    }
}


if ($a == "Approved") {
    if (User::dialogCanReview()) {
        $d = new Dialog();
        $d->setDialogId($id);
        $d->updateDialogApproved();
        echo "Approved";
    } else {
        echo "permission denied";
    }
}

if ($a == "Rejected") {
    if (User::dialogCanReview()) {
        $d = new Dialog();
        $d->setDialogId($id);
        $d->updateDialogRejected();
        echo "Rejected";
        proved();
    } else {
        echo "permission denied";
    }
}
?>
