<?php

require_once 'core/Arc.php';
require_once 'core/DialogoTraducao.php';
require_once 'core/DialogoOriginal.php';
require_once 'core/Extrair.php';
require_once 'core/Lang.php';
require_once 'core/Formatacao.php';
require_once 'core/util.php';

#$arc = "0-Common.arc";
#$arc = "1-Town.arc";
#$arc = "2-Forest.arc";
#$arc = "3-Mountain.arc";
#$arc = "4-Desert.arc";
#$arc = "5-CenterField.arc";

echo ("<pre>");
//foreach (Lang::getLangs() as $lang)
//foreach (ExtArc::getFileNames() as $arc) {
//    foreach (ExtArc::getFileNamesInArc($arc) as $msbt) {
//        foreach (ExtArc::getFileNamesInArcSubs( $msbt) as $pos) { 

//            echo "\n" . $arc ." - ". $msbt." - ". $pos." - ". $lang;
//        }
//    }
//}

$o = new Formatacao("0000");
$o->gerarTags();

?>


