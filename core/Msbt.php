<?php

require_once 'core/util.php';
require_once 'core/Dialog.php';

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

    public static function rip($lang,$arc,$msbt) {
        
        if($msbt == "001-Action.msbt"){
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

        for ($i = 0; $i < $nrFrases; $i++) {
            $pos = $i;
            while (strlen($pos) < 3) {
                $pos = "0" . $pos;
            }

//            $o = new Dialog();
//            $o->setArc($arc);
//            $o->setMsbt($msbt);
//            $o->setPos($pos);
//            $o->setLang($lang);
//            $o->setName($lista_nomes[$i]->name);
//            $o->setDialogBin($lista_nomes[$i]->msg);
//            
//            self::$cont++;
//            echo self::$cont . "\n";
//            $sql = sprintf("INSERT INTO `tt_dialog_lang`(`dialog_id`, `lang_id`, `dialog_status_id`, `dialog`, `version`  ) VALUES ( %s, 7, 1 , '%s' , '1.0')",self::$cont, mysql_real_escape_string($o->getDialogTagHex()) ) ;
//            $o->runQuery($sql);
            

            
            /*grava no arquivo*/
//            $file = getDirTMP() . $lang . DIRECTORY_SEPARATOR . $arc . ".d" . DIRECTORY_SEPARATOR . $msbt . ".d" . DIRECTORY_SEPARATOR . $pos;
//            gravarArquivo($file, $o->getDialogoBinario());
            
        }

    }

    public static function remount($langBase, $arc, $msbt) {

        $fileBase = getDirTMP() . $langBase . DIRECTORY_SEPARATOR . $arc . ".d" . DIRECTORY_SEPARATOR . $msbt;
        $folderBase = $fileBase . ".d" . DIRECTORY_SEPARATOR;

        $filePt_BR = getDirTMP() . "pt_BR" . DIRECTORY_SEPARATOR . $arc . ".d" . DIRECTORY_SEPARATOR . $msbt;
        $folderPt_BR = $filePt_BR . ".d" . DIRECTORY_SEPARATOR;

        $handle = fopen($fileBase, "r");
        $fileBin = fread($handle, filesize($fileBase));


        $lista_nomes = array();
        $offset = hexDec("0x12c");

        $i = 0;
        while (( bin2Hex(substr($fileBin, $offset, 1)) != "ab") && ( bin2Hex(substr($fileBin, $offset, 2)) != "4154")) {
            $comprimento_string = hexDec(bin2Hex(substr($fileBin, $offset, 1)));

            $name = substr($fileBin, $offset + 1, $comprimento_string);
            $pos = hexDec(bin2Hex(substr($fileBin, $offset + $comprimento_string + 1, 4)));

            $lista_nomes[$i] = new Msbt($name, $pos);
            $i++;

            $offset = $offset + 1 + $comprimento_string + 4;
        }

        #ATR1
        $offset = 0;
        while (substr($fileBin, $offset, 4) != "ATR1") {
            $offset += 16;
        }
        #printLog("ATR1 in :" . decHex($offset));
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
        #printLog("TXT2 in :" . decHex($offset));

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



        $inicio = substr($fileBin, 0, $offset);

        $fileNames = Arc::getFileNamesInArcSubs($msbt);
        $offsets = myInt2bin(count($fileNames));
        $offsetMSG = 4 + (count($fileNames) * 4);

        $mensages = "";
        foreach ($fileNames as $name) {
            if (file_exists($folderPt_BR . $name)) {
                $handle = fopen($folderPt_BR . $name, "r");
            } else {
                $handle = fopen($folderBase . $name, "r");
            }
            $msg = fread($handle, filesize($fileBase));

            $offsets .= myInt2bin($offsetMSG);
            $offsetMSG += strlen($msg);


            $mensages .= $msg;
        }

        $arquivivoFinal = $inicio . $offsets . $mensages;

        while ((strlen($arquivivoFinal) % 16)) {
            $arquivivoFinal .= myHex2bin("ab");
        }

        gravarArquivo($filePt_BR, $arquivivoFinal);
    }

}


?>
