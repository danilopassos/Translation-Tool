<?php

require_once(dirname(__FILE__) .'/../core/util.php');
require_once(dirname(__FILE__) .'/../core/Arc.php');
require_once(dirname(__FILE__) .'/../core/Msbt.php');

class Extrair {

    public static function extrairMsbt() {
        foreach (Lang::getLangs() as $lang) {
            if ("$lang" != "pt_BR") {
                rrmdir(getDirTMP() . $lang);

                $folder = getDirROOT() . $lang->getRegion() . DIRECTORY_SEPARATOR .
                        "Object" . DIRECTORY_SEPARATOR . $lang . DIRECTORY_SEPARATOR;

                $folderOut = getDirTMP() . $lang . DIRECTORY_SEPARATOR;
                $files = getFiles($folder, ".arc");

                echo ("\nRipando em " . $folder);

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
                    echo ("\nextracting the dialogues: " . $lang . "/" . $arc . "/" . $msbt);
                    Msbt::rip($lang, $arc, $msbt);
                }
            }
        }
    }

}

?>
