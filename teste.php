<?php

require_once 'core/util.php';
require_once 'core/Lang.php';

echo "
<!DOCTYPE HTML>
<html>

  <head>
      <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"/> 
      <title> o/</title>
      
  </head>
  <!-- -->
  <body>    

<pre>";

printLog("getDirROOT() = " . getDirROOT());
printLog("getDirTMP()  = " . getDirTMP());
printLog("");


printLog("Lang::getUmaUnicaLang() = " . Lang::getUmaUnicaLang());

printLog("bin2hex(\"Adriano\") = " . bin2hex("Adriano"));

if (isset($_GET["hex"])) {
    $hex = $_GET["hex"];
    $msgBR = hex2bin($hex);

    printLog("\$hex = " . $hex);
    printLog("\$bin = " . $msgBR);
    printLog("\$utf-8 = " . utf8_encode($msgBR) );
    printLog("\$utf16 to 8 = " . utf16ToUtf8($msgBR) );
}
?>
