<?php
/*
 * Este arquivo configura a inicialização do smarty
 */

require_once "inc/smarty/libs/Smarty.class.php";
session_start();

$sm = new Smarty;
$sm->template_dir = "view/";
$sm->compile_dir = "inc/smarty/templates_c";

if(isset($_SESSION["user"])){
    $sm->assign("user", $_SESSION["user"]."<a href=\"sair.php\">(sair)</a>");
    
}else{
    $sm->assign("user","<a href=\"logar.php\">Logar</a>");
}
?>