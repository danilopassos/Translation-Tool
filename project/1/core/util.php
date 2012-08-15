<?php

/*
 * pasta que contem os arquivos originais dos jogo
 * ele são usado para extrair os dialogos e tambem durante a remontagem
 */

function getDirROOT() {
    return dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "ISO" . DIRECTORY_SEPARATOR . "ROOT" . DIRECTORY_SEPARATOR;
}

/*
 * pasta de destino das extrações/remontagen
 * aqui precisa de permição de leitura e escrita
 */

function getDirTMP() {
    return dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "ISO" . DIRECTORY_SEPARATOR . "tmp" . DIRECTORY_SEPARATOR;
}

/*
 * função identica a Hex2bin do PHP5.4 
 * mas assim com um nome difrente funciona
 * em qualquer versão sem intervenção
 */

function myHex2bin($h) {
    if (!is_string($h))
        return null;
    $r = '';
    for ($a = 0; $a < strlen($h); $a+=2) {
        $r.=chr(hexdec($h{$a} . $h{($a + 1)}));
    }
    return $r;
}

function utf8ToUtf16($str) {
    return mb_convert_encoding($str, 'utf-16', 'utf8');
}

function utf16ToUtf8($str) {
    return mb_convert_encoding($str, 'utf8', 'utf-16');
}

/*
 * retorna uma lista com o nome dos arquivo
 * de um diretorio, filtrando pela extenção($ext)
 */

function getFiles($folder, $ext) {
    $all_files = scandir($folder);
    $files = array();

    $i = 0;
    foreach ($all_files as $f) {
        if ($f != "." && $f != "..") {
            if (substr($f, -1 * strlen($ext)) == $ext || $ext == "" || $ext == null) {
                if (!is_dir($folder . DIRECTORY_SEPARATOR . $f)) {
                    $files[$i] = $f;
                    $i++;
                }
            }
        }
    }
    return $files;
}

function printLog($msg) {
    echo $msg . "\n";
}

/*
 * Formata um numero inteiro
 * em binario 32bits
 */

function myInt2bin($int) {
    $hex = decHex($int);
    while (strlen($hex) < 8) {
        $hex = "0" . $hex;
    }
    return myHex2bin($hex);
}

/*
 * remove um diretorio e todo seu conteudo
 */

function rrmdir($dir) {
    try {
        foreach (glob($dir . '/*') as $file) {
            if (is_dir($file))
                rrmdir($file);
            else
                unlink($file);
        }
        rmdir($dir);
    } catch (Exception $ex) {
        
    }
}

function gravarArquivo($caminhoArquivo, $Bin) {
    if (!file_exists(dirname($caminhoArquivo))) {
        mkdir(dirname($caminhoArquivo), 0777, true);
    }
    $novoarquivo = fopen($caminhoArquivo, "w");
    fwrite($novoarquivo, $Bin, strlen($Bin));
    fclose($novoarquivo);
}

function lerArquivo($caminhoArquivo) {

    $handle = fopen($caminhoArquivo, "r");
    $fileBin = fread($handle, filesize($caminhoArquivo));
    return $fileBin;
}

?>
