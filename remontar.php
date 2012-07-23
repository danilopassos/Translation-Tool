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
        require_once 'salvar.php';

        echo "<pre>\n";

        foreach (ExtArc::getFileNames() as $arc) {
            foreach (ExtArc::getFileNamesInArc($arc) as $msbt) {
                Msbt::remount("en_US", $arc, $msbt);
            }
        }

        foreach (ExtArc::getFileNames() as $arc) {
            ExtArc::remount("en_US", $arc);
        }
        
        echo "\n\n";





        