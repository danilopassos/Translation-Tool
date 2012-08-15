<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
        <title> insert </title>
        <link href="style/style.css" rel="stylesheet" type="text/css" media="screen" />
    </head>

    <body>
<?php
require_once 'core/util.php';
require_once 'core/Arc.php';
require_once 'core/Lang.php';
require_once 'core/Dialog.php';

echo "<pre>\n";

#$arc = "0-Common.arc";
#$arc = "1-Town.arc";
#$arc = "2-Forest.arc";
#$arc = "3-Mountain.arc";
#$arc = "4-Desert.arc";
#$arc = "5-CenterField.arc";

#foreach (ExtArc::getFileNames() as $arc) 
//    foreach (ExtArc::getFileNamesInArc($arc) as $msbt) {
//        foreach (ExtArc::getFileNamesInArcSubs($msbt) as $pos) {
//            $o = new Dialogo($arc, $msbt, $pos, "pt_BR");
//            $c = getDirTMP() . "pt_BR" . DIRECTORY_SEPARATOR . "$arc.d" . DIRECTORY_SEPARATOR . "$msbt.d" . DIRECTORY_SEPARATOR . $pos;
//            gravarArquivo($c, $o->getDialogoBinario());
//            echo "\n" . $arc . "/" . $msbt . "/" . $pos;
//        }
//    }

$timeStart = microtime(true);
$o = new Dialog();
$sql = "SELECT * 
FROM  `tt_dialog_lang` 
WHERE  `lang_id` =7 AND version='last'";

$r = $o->runSelect($sql);

$cont = 0;

/*create news msbt files*/
foreach (Arc::getFileNames() as $arc) {
    foreach (Arc::getFileNamesInArc($arc) as $msbt) {
        $dialogs = array();
        foreach (Arc::getFileNamesInArcSubs( $msbt) as $pos) {        
            $o = new Dialog();
            $o->setDialogTag($r[$cont]['dialog']);
           
            array_push($dialogs, $o->getDialogBin());
            
            $cont++;
        }
        Msbt::remount("en_US", $arc, $msbt,$dialogs);
//        echo "\n" . $arc . "/" . $msbt;
    }
}

/*create news arc files*/
foreach (Arc::getFileNames() as $arc){
    Arc::remount("en_US", $arc);
//    echo "\n" . $arc;   
}

echo "\n\n\tTime total (seg):" . ( microtime(true) - $timeStart);

echo "\n\n"
?>