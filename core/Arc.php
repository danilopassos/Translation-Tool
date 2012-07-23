<?php

/*
 * Classe destinada a manipulação dos arquivos *.arc contidos na iso
 * 
 */
require_once 'core/util.php';
require_once 'core/Msbt.php';
require_once 'core/Lang.php';

class ExtArc {

    private static $files = array("0-Common.arc", "1-Town.arc", "2-Forest.arc", "3-Mountain.arc", "4-Desert.arc", "5-CenterField.arc");

    public static function getFileNames() {
        return ExtArc::$files;
    }

    public static function getFileNamesInArc($arcFile) {

        #isso só funciona para a iso Americana
        $dir = getDirTMP() . Lang::getUmaUnicaLang() . DIRECTORY_SEPARATOR . $arcFile . ".d" . DIRECTORY_SEPARATOR;
        //echo ("dir: " . $dir);

        $list = getFiles($dir, ".msbt");

        return $list;
    }

    public static function getFileNamesInArcSubs($arcFile, $msbtFile) {

        $dir = getDirTMP() . Lang::getUmaUnicaLang() . DIRECTORY_SEPARATOR . $arcFile . ".d" . DIRECTORY_SEPARATOR . $msbtFile . ".d" . DIRECTORY_SEPARATOR;
        //echo ("dir: " . $dir);
        $list = getFiles($dir, "");

        return $list;
    }

    static function rip($folder, $fileName, $folderOut) {



        $handle = fopen($folder . $fileName, "r");
        $fileBin = fread($handle, filesize($folder . $fileName));
        #fclose($file_arc);

        $nr_sub_arquivos = 1;
        $sub_arquivos_nome = array();
        $sub_arquivos_offset_nome = array();
        $sub_arquivos_offset_arquivos = array();
        $sub_arquivos_tamanho = array();

        $offset = hexDec("0x38");
        while (true) {
            $sub_arquivos_offset_nome[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
            $offset += 4;
            $sub_arquivos_offset_arquivos[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
            $offset += 4;
            $sub_arquivos_tamanho[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
            $offset += 4;

            if (bin2Hex(substr($fileBin, $offset, 1)) == "01") {
                $nr_sub_arquivos++;
                $offset += 12;
                $sub_arquivos_offset_nome[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
                $offset += 4;
                $sub_arquivos_offset_arquivos[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
                $offset += 4;
                $sub_arquivos_tamanho[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
                $offset += 4;
                break;
            } else {
                $nr_sub_arquivos++;
            }
        }

        //localiza apenas o nome dos sub arquivos
        $offset_nomes = $offset;
        for ($i = 1; $i <= $nr_sub_arquivos; $i++) {
            $sub_arquivos_nome[$i] = "";
            $pos = $offset_nomes + hexDec($sub_arquivos_offset_nome[$i]);
            while (true) {
                $caracter = substr($fileBin, $pos, 1);
                if ($caracter == myHex2bin("00")) {
                    break;
                } else {
                    $sub_arquivos_nome[$i] .= $caracter;
                    $pos++;
                }
            }
        }

        //cria o diretorio de saida caso ainda não exista

        if (mkdir($folderOut, 0, true)) {
            printLog("pasta de saida: " . $folderOut);

            //grava sub arquios
            for ($i = 1; $i <= $nr_sub_arquivos; $i++) {

                gravarArquivo($folderOut . $sub_arquivos_nome[$i], substr($fileBin, hexDec($sub_arquivos_offset_arquivos[$i]), hexDec($sub_arquivos_tamanho[$i])));

                if (substr($sub_arquivos_nome[$i], -5) == ".msbt") {

                    printLog("ExtMsbt::rip  " . $folderOut . $sub_arquivos_nome[$i]);

                    Msbt::rip($folderOut . $sub_arquivos_nome[$i]);
                }
            }

            //menssage final
            printLog("\nExtraido " . $nr_sub_arquivos . " arquivos.");
        } else {
            printLog("erro criando pasta de saida: " . $folderOut);
        }
    }

    public static function remount($langBase, $arc) {
        $langBase = new Lang("$langBase");
        $fileBase = getDirROOT() . $langBase->getRegion() . DIRECTORY_SEPARATOR .
                "Object" . DIRECTORY_SEPARATOR . $langBase .
                DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . $arc;

        $folderBase = getDirTMP() . $langBase . DIRECTORY_SEPARATOR . $arc . ".d" . DIRECTORY_SEPARATOR;

        $filePt_BR = getDirTMP() . "pt_BR" . DIRECTORY_SEPARATOR . $arc;
        $folderPt_BR = $filePt_BR . ".d" . DIRECTORY_SEPARATOR;

        $handle = fopen($fileBase, "r");
        $fileBin = fread($handle, filesize($fileBase));


        $inicio = substr($fileBin, 0, 56);

        $mensages = "";
        $nomes = getFiles($folderBase, "");
        $ponteiroAbsolutoPrimeiroArquivo = hexDec(bin2Hex(substr($fileBin, 12, 4)));
        $ponteiroAbsoluto = $ponteiroAbsolutoPrimeiroArquivo;
        for ($i = 0; $i < (count($nomes) - 1); $i++) {

            $nome = $nomes[$i];
            echo "\n" . $nome;
            if (file_exists($folderPt_BR . $nome)) {
                $handle = fopen($folderPt_BR . $nome, "r");
            } else {
                $handle = fopen($folderBase . $nome, "r");
            }
            $msg = fread($handle, filesize($fileBase));
            $mensages .= $msg;

            $inicio .= substr($fileBin, strlen($inicio), 4);
            $inicio .= myInt2bin($ponteiroAbsoluto);
            $ponteiroAbsoluto += strlen($msg);
            $inicio .= myInt2bin(strlen($msg));
        }

        $inicio .= substr($fileBin, strlen($inicio), 16);

        $handle = fopen($folderBase . "zev.dat", "r");
        $msg = fread($handle, filesize($fileBase));
        $mensages .= $msg;

        $inicio .= myInt2bin($ponteiroAbsoluto);
        $inicio .= myInt2bin(strlen($msg));
        $inicio .= substr($fileBin, strlen($inicio), $ponteiroAbsolutoPrimeiroArquivo - strlen($inicio));
        $arquivivoFinal = $inicio . $mensages;
        gravarArquivo($filePt_BR, $arquivivoFinal);
    }

}

?>
