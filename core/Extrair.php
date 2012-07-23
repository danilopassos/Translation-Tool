<?php

require_once 'core/util.php';
require_once 'core/Arc.php';
require_once 'core/Msbt.php';

class Extrair {

    public static function extrairTudo() {



        foreach (Lang::getLangs() as $lang) {
            if ("$lang" != "pt_BR") {
                rrmdir(getDirTMP() . $lang);

                $folder = getDirROOT() . $lang->getRegion() . DIRECTORY_SEPARATOR .
                        "Object" . DIRECTORY_SEPARATOR . $lang . DIRECTORY_SEPARATOR;

                $folderOut = getDirTMP() . $lang . DIRECTORY_SEPARATOR;
                $files = getFiles($folder, ".arc");

                printLog("Ripando em " . $folder);

                foreach ($files as $file) {
                    printLog($folder . $file);
                    ExtArc::rip($folder, $file, $folderOut . $file . ".d" . DIRECTORY_SEPARATOR);
                }
            }
        }
    }

    public static function extrairArcFile($arcfile) {
        
    }

    public static function extrairMsbtFile($arcfile) {
        
    }

}

?>
