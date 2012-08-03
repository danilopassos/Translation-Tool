<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
        <title>Portal Tradução .: The Legend of Zelda: Skyward Sword :.  pt_BR </title>
        <link href="style/style.css" rel="stylesheet" type="text/css" media="screen" />
    </head>

    <body>
<?php
require_once 'core/util.php';
require_once 'core/Arc.php';
require_once 'core/Lang.php';
require_once 'core/Dialogo.php';

echo "<pre>\n";


#$arc = "0-Common.arc";
$arc = "1-Town.arc";
#$arc = "2-Forest.arc";
#$arc = "3-Mountain.arc";
#$arc = "4-Desert.arc";
#$arc = "5-CenterField.arc";

#foreach (ExtArc::getFileNames() as $arc) 
    foreach (ExtArc::getFileNamesInArc($arc) as $msbt) {
        foreach (ExtArc::getFileNamesInArcSubs($msbt) as $pos) {
            $o = new Dialogo($arc, $msbt, $pos, "pt_BR");
            $c = getDirTMP() . "pt_BR" . DIRECTORY_SEPARATOR . "$arc.d" . DIRECTORY_SEPARATOR . "$msbt.d" . DIRECTORY_SEPARATOR . $pos;
            gravarArquivo($c, $o->getDialogoBinario());
            echo "\n" . $arc . "/" . $msbt . "/" . $pos;
        }
    }



#foreach (ExtArc::getFileNames() as $arc) 
    foreach (ExtArc::getFileNamesInArc($arc) as $msbt) {
        Msbt::remount("en_US", $arc, $msbt);
        echo "\n" . $arc . "/" . $msbt;
    }


#foreach (ExtArc::getFileNames() as $arc)
    ExtArc::remount("en_US", $arc);
    echo "\n" . $arc;




//
#fazer validação do tamanho dos arquivos

echo "\n\n";






        