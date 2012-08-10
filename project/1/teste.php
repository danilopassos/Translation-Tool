<?php

require_once(dirname(__FILE__) .'/core/Arc.php');
require_once(dirname(__FILE__) .'/core/Msbt.php');
require_once(dirname(__FILE__) .'/core/Dialog.php');
require_once(dirname(__FILE__) .'/core/Extrair.php');
require_once(dirname(__FILE__) .'/core/Lang.php');
require_once(dirname(__FILE__) .'/core/Format.php');
require_once(dirname(__FILE__) .'/core/util.php');

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
$lang = 6;
$cont = ($lang * 7707);
foreach (Arc::getFileNames() as $arc) {
    foreach (Arc::getFileNamesInArc($arc) as $msbt) {
        foreach (Arc::getFileNamesInArcSubs( $msbt) as $pos) { 
            $o = new Dialog();
            
            $cont++;

            $sql = "SELECT `dialog` d FROM `tt_dialog_lang` WHERE `dialog_lang_id`=" . $cont;
            $ret = $o->runSelect($sql);
            $o->setDialogTagHex($ret[0]['d']);
            
            
            $sql = "UPDATE `tt_dialog_lang` SET `dialog`='". mysql_real_escape_string( $o->getDialogTag() ) ."' WHERE `dialog_lang_id`=" . $cont;
            #$ret = $o->runQuery($sql);
            
            echo "\n" . $o->getDialogTagHex();
            echo "\n" . $o->getDialogTag();
            
            echo "\n<br>" . $arc ."/". $msbt."/". $pos."\t\t " .$cont;
        }
    }
}
//
//echo "\n total dialogos\t\t" .$cont;
//echo "\n total dialogos revisados\t\t" .$contRevisados;
//echo "\n total dialogos Nulos\t\t" .$contNull; 
//
//echo "\n Estado da tradução: " .( ($contRevisados / ($cont - $contNull)) * 100) . "%";


?>


