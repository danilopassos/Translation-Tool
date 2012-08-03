<?php

require_once 'core/Arc.php';
require_once 'core/Msbt.php';
require_once 'core/Dialogo.php';
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

//echo ("<pre>");
////foreach (Lang::getLangs() as $lang)
//foreach (ExtArc::getFileNames() as $arc) {
//    foreach (ExtArc::getFileNamesInArc($arc) as $msbt) {
//        foreach (ExtArc::getFileNamesInArcSubs( $msbt) as $pos) { 
//            echo "\n<br>" . $arc ."/". $msbt."/". $pos;
//        }
//    }
//}



/*
 * Extrai todos os textos de um idioma para html
 */

//$contNull = 0;
//$cont=0;
//$contRevisados=0;
//
//foreach (ExtArc::getFileNames() as $arc) {
//    foreach (ExtArc::getFileNamesInArc($arc) as $msbt) {
//        foreach (ExtArc::getFileNamesInArcSubs( $msbt) as $pos) { 
////            echo "\n<br>" . $arc ."/". $msbt."/". $pos;
//            $o = new Dialogo($arc, $msbt, $pos, "pt_BR");
//            
//            $cont++;
//            if($o->isRevisado()){
//                $contRevisados++;
//            }
//            if($o->isDialogoVazil()){
//                $contNull++;
//            }
//            
////            echo "\n<br>" . $arc ."/". $msbt."/". $pos;
//        }
//    }
//}
//
//echo "\ntotal dialogos\t\t" .$cont;
//echo "\ntotal dialogos revisados\t\t" .$contRevisados;
//echo "\ntotal dialogos Nulos\t\t" .$contNull;
//
//echo "\nestado da tradução: " .( ($contRevisados / ($cont - $contNull)) * 100) . "%";

Msbt::rip("en_US", "0-Common.arc", "004-Object.msbt");

?>


