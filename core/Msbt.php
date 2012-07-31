<?php

/*
 * Classe destinada a manipulação dos arquivos *.msbt 
 * contidos dentro de arquivos *.arc 
 * 
 */

require_once 'core/util.php';
require_once 'core/DialogoOriginal.php';

class Msbt {

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

            $lista_nomes[$i] = new Msbt($name, $pos);
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

            $o = new DialogoOriginal($arc, $msbt, $pos, $lang, FALSE);
            $o->setNome($lista_nomes[$i]->name);
            $o->setDialogoBinario($lista_nomes[$i]->msg);
            
            /* grava no banco */
            $o->insert();
            
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

        $nomes = ExtArc::getFileNamesInArcSubs($msbt);
        $offsets = myInt2bin(count($nomes));
        $offsetMSG = 4 + (count($nomes) * 4);

        $mensages = "";
        foreach ($nomes as $nome) {
            if (file_exists($folderPt_BR . $nome)) {
                $handle = fopen($folderPt_BR . $nome, "r");
            } else {
                $handle = fopen($folderBase . $nome, "r");
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
