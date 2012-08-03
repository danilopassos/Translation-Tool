<?php
require_once 'core/Dialogo.php';

$arc = $_GET["arc"]; 
$msbt = $_GET["msbt"]; 
$pos = $_GET["pos"];

$d = new Dialogo($arc, $msbt , $pos , "en_US");

?>
nome:<?php echo $d->getNome(); ?><br>
ultima edição:<br>
revisado por: