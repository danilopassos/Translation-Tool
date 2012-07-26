<?php

require_once 'core/DialogoTraducao.php';

if(isset($_GET["tradu"])){
    $o = new DialogoTraducao();
    $o->setDialogoUtf8( $_GET["tradu"] );
    echo $o->getDialogoHtml();
}else{
    echo "falhou";
}

?>
