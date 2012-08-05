<?php

require_once 'core/util.php';
require_once 'core/Arc.php';
require_once 'core/Msbt.php';

class Extrair {

    public static function extrairMsbt() {
        foreach (Lang::getLangs() as $lang) {
            if ("$lang" != "pt_BR") {
                rrmdir(getDirTMP() . $lang);

                $folder = getDirROOT() . $lang->getRegion() . DIRECTORY_SEPARATOR .
                        "Object" . DIRECTORY_SEPARATOR . $lang . DIRECTORY_SEPARATOR;

                $folderOut = getDirTMP() . $lang . DIRECTORY_SEPARATOR;
                $files = getFiles($folder, ".arc");

                printLog("Ripando em " . $folder);

                foreach ($files as $file) {
                    ExtArc::rip($lang, $folder, $file, $folderOut . $file . ".d" . DIRECTORY_SEPARATOR);
                }
            }
        }
    }

    public static function extrairDialogos() {
        foreach (Lang::getLangs() as $lang) {
            foreach (Arc::getFileNames() as $arc) {
                foreach (Arc::getFileNamesInArc($arc) as $msbt) {
                    printLog("extracting the dialogues: " . $lang . "/" . $arc . "/" . $msbt);
                    Msbt::rip($lang, $arc, $msbt);
                }
            }
        }
    }

}

?>
