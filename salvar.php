<?php

require_once 'core/util.php';
require_once 'core/Dicionario.php';
require_once 'core/Lang.php';


function salvar01($arc, $msbt, $pos, $utf8) {
    $d = new Dicionario();
    $d->setLang(new Lang("pt_BR"));
    $d->setArc($arc);
    $d->setMsbt($msbt);
    $d->setPosicao($pos);

    $Bin = Dicionario::formatoUtf8ParaFormatoBinario($utf8);

    gravarArquivo($d->getPathTmpFile(), $Bin);

    //printLog("Arquivo gravado: " . $d->getPathTmpFile());
}

if (isset($_GET["arc"])) {
    //echo "<pre>";
    salvar01($_GET["arc"], $_GET["msbt"], $_GET["pos"],  ( $_GET["utf8"]));
    
    $link = "traduzir.php?arc=" . $_GET["arc"] . "&msbt=" . $_GET["msbt"] . "&pos=" . $_GET["pos"] ;
    //echo "<a href=\"$link\" > Voltar </a>" ;
    header("location:$link");
}
?>
