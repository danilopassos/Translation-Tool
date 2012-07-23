<?php
require_once 'core/util.php';


function formataAquivoEmHexadecimal($file){
    echo "\n";
    echo "file: ".$file;
    echo "\n";
    echo "filesize: ".filesize($file);
    echo "\n\n";
    
    $handle = fopen($file,"r");
    $fcontent = fread($handle, filesize($file));   
    fclose($handle);
    
    $fileHex = bin2hex($fcontent);
    
    #echo $fileHex;
    for($offset=0; $offset <= filesize($file); $offset+=4){
        $subHex = substr($fileHex, $offset*2, 8);
        
        echo "0x".decHex($offset);
        echo "\t";
        echo $subHex;
        echo " -> valor: ";
        echo hexDec($subHex);
        #echo ' - ';
        #echo hexBin($subHex);
        echo "\n";
    }
}

$file = getDirROOT() . $_GET['f'];

echo formataAquivoEmHexadecimal($file);

echo "<br>eof"
?>