<?php

require_once(dirname(__FILE__) . '/../core/util.php');
require_once(dirname(__FILE__) . '/../core/Dialog.php');
require_once(dirname(__FILE__) . '/../core/Lang.php');

class Msbt {

    static $cont = 0;
    var $name;
    var $pos;
    var $msg;
    var $ATR1;
    var $TXT2;

    function __construct($name, $pos) {
        $this->name = $name;
        $this->pos = $pos;
    }

    function __toString() {
        $r = "\n";
        $r .= "pos:\t" . $this->pos . "\n";
        $r .= "name:\t" . $this->name . "\n";
        $r .= "ATR1:\t" . $this->ATR1 . "\n";
        $r .= "TXT2:\t" . $this->TXT2 . "\n";

        return $r;
    }

    public static function rip($lang, $arc, $msbt) {

        if ($msbt == "001-Action.msbt") {
            self::$cont = 0;
        }

        $file_msbt = getDirTMP() . $lang . DIRECTORY_SEPARATOR . "$arc.d" . DIRECTORY_SEPARATOR . $msbt;

        $handle = fopen($file_msbt, "r");
        $fileBin = fread($handle, filesize($file_msbt));

        $lista_nomes = array();

        $offset = hexDec("0x12c");

        $i = 0;
        while (( bin2Hex(substr($fileBin, $offset, 1)) != "ab") && ( bin2Hex(substr($fileBin, $offset, 2)) != "4154")) {
            $comprimento_string = hexDec(bin2Hex(substr($fileBin, $offset, 1)));

            $name = substr($fileBin, $offset + 1, $comprimento_string);
            $pos = hexDec(bin2Hex(substr($fileBin, $offset + $comprimento_string + 1, 4)));

            $lista_nomes[$pos] = new Msbt($name, $pos);
            $i++;

            $offset = $offset + 1 + $comprimento_string + 4;
        }


        #ATR1
        $offset = 0;
        while (substr($fileBin, $offset, 4) != "ATR1") {
            $offset += 16;
        }

        $nrFrases = hexDec(bin2Hex(substr($fileBin, $offset + 16, 4)));
        $offset += 16 + 8;
        for ($i = 0; $i < $nrFrases; $i++) {

            $lista_nomes[$i]->ATR1 = hexDec(bin2Hex(substr($fileBin, $offset, 2)));
            $offset += 2;
        }

        #TXT2
        $offset = 0;
        while (substr($fileBin, $offset, 4) != "TXT2") {
            $offset += 16;
        }

        $offset += 16 + 4;
        for ($i = 0; $i < $nrFrases; $i++) {

            $lista_nomes[$i]->TXT2 = hexDec(bin2Hex(substr($fileBin, $offset, 4)));
            $offset += 4;
        }

        $offset = 0;
        while (substr($fileBin, $offset, 4) != "TXT2") {
            $offset += 16;
        }
        $offset += 16;
        for ($i = 0; $i < $nrFrases; $i++) {
            if ($i == $nrFrases - 1) { //se for o ultimo
                $lista_nomes[$i]->msg = substr($fileBin, $offset + $lista_nomes[$i]->TXT2);
            } else {
                $lista_nomes[$i]->msg = substr($fileBin, $offset + $lista_nomes[$i]->TXT2, $lista_nomes[$i + 1]->TXT2 - $lista_nomes[$i]->TXT2);
            }
        }
        echo "\t" . $nrFrases;


        if (($msbt == "word.msbt") && ($lang == "ja_JP")) {
            $nrFrases += 10;
            for ($i = 0; $i < 10; $i++) {
                $o = new Msbt("", "");
                array_push($lista_nomes, $o);
            }
        }

        for ($i = 0; $i < $nrFrases; $i++) {
            self::$cont++;
            echo self::$cont . "\n";

            $pos = $i;
            while (strlen($pos) < 3) {
                $pos = "0" . $pos;
            }

            $o = new Dialog();
            $o->setArc($arc);
            $o->setMsbt($msbt);
            $o->setPos($pos);
            $o->setLang($lang);
            $o->setName($lista_nomes[$i]->name);
            $o->setDialogBin($lista_nomes[$i]->msg);


            /* salve in db */
            $sql = sprintf("INSERT INTO `tt_dialog_lang`(`dialog_id`, `lang_id`, `dialog_status_id`, `dialog`, `version`  ) VALUES ( %s, %s, 6 , '%s' , '1.0')", self::$cont, Lang::getId($lang), mysql_real_escape_string($o->getDialogTagHex()));
            $o->runQuery($sql);


            /* salve in file */
//            $file = getDirTMP() . $lang . DIRECTORY_SEPARATOR . $arc . ".d" . DIRECTORY_SEPARATOR . $msbt . ".d" . DIRECTORY_SEPARATOR . $pos;
//            gravarArquivo($file, $lista_nomes[$i]->msg);
        }
    }

    public static function remount($langBase, $arc, $msbt, $dialogs) {
        $fileBase = getDirTMP() . $langBase . DIRECTORY_SEPARATOR . $arc . ".d" . DIRECTORY_SEPARATOR . $msbt;
        $filePt_BR = getDirTMP() . "pt_BR" . DIRECTORY_SEPARATOR . $arc . ".d" . DIRECTORY_SEPARATOR . $msbt;
    
        $handle = fopen($fileBase, "r");
        $fileBin = fread($handle, filesize($fileBase));

        $offset = 0;
        while (substr($fileBin, $offset, 4) != "TXT2") {
            $offset += 16;
        }
        $offset += 16;

        $inicio = substr($fileBin, 0, $offset);

        $fileNames = Arc::getFileNamesInArcSubs($msbt);
        $offsets = myInt2bin(count($fileNames));
        $offsetMSG = 4 + (count($fileNames) * 4);

        $mensages = "";
        foreach ($dialogs as $dialog) {
            $offsets .= myInt2bin($offsetMSG);
            $offsetMSG += strlen($dialog);
            $mensages .= $dialog;
        }

        $arquivivoFinal = $inicio . $offsets . $mensages;

        while ((strlen($arquivivoFinal) % 16)) {
            $arquivivoFinal .= myHex2bin("ab");
        }

        gravarArquivo($filePt_BR, $arquivivoFinal);
    }
}
?>
