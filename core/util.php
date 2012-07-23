<?php

function getDirROOT() {
    return realpath(".") . DIRECTORY_SEPARATOR . "ISO" . DIRECTORY_SEPARATOR . "ROOT" . DIRECTORY_SEPARATOR;
}

function getDirTMP() {
    return realpath(".") . DIRECTORY_SEPARATOR . "ISO" . DIRECTORY_SEPARATOR . "tmp" . DIRECTORY_SEPARATOR;
}

/* usar essa função se O PHP < 5.4 */

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

function getFiles($folder, $ext) {
    $all_files = scandir($folder);
    $files = array();

    $i = 0;
    foreach ($all_files as $f) {
        if ($f != "." && $f != "..")
            if (substr($f, -1 * strlen($ext)) == $ext || $ext == "") {
                if(!is_dir($folder . DIRECTORY_SEPARATOR . $f)){
                    $files[$i] = $f;
                    $i++;
                
                }
            }
    }

    return $files;
}

function printLog($msg) {
    echo $msg . "\n";
}

function myInt2bin($int) {
    $hex = decHex($int);
    while (strlen($hex) < 8) {
        $hex = "0" . $hex;
    }
    return myHex2bin($hex);
}

# recursively remove a directory

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
    mkdir(dirname($caminhoArquivo), 0, true);
    $novoarquivo = fopen($caminhoArquivo, "w");
    fwrite($novoarquivo, $Bin, strlen($Bin));
    fclose($novoarquivo);
}

?>
