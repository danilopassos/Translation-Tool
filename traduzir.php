<?php

require_once "sm.php";
require_once 'core/util.php';
require_once 'core/Lang.php';
require_once 'core/Arc.php';
require_once 'core/Dicionario.php';

$sm->assign("DialogoPT_BR", null);
$sm->assign("arc", null);
$sm->assign("msbt", null);
$sm->assign("msbts", null);
$sm->assign("poss", null);
$sm->assign("msgs", null);
$sm->assign("pos", null);
$sm->assign("arcs", ExtArc::getFileNames());

if (isset($_GET["arc"])) {
    $arc = $_GET["arc"];
    $sm->assign("arc", $arc);
    $sm->assign("msbts", ExtArc::getFileNamesInArc($arc));
    if (isset($_GET["msbt"])) {
        $msbt = $_GET["msbt"];
        $sm->assign("msbt", $msbt);
        $sm->assign("poss", ExtArc::getFileNamesInArcSubs($arc, $msbt));
        if (isset($_GET["pos"])) {
            $pos = $_GET["pos"];
            while(strlen($pos) < 3){
                $pos =  "0" . $pos;
            }
            $msgs = array();
            foreach (Lang::getLangs() as $lang) {
                $o = new Dicionario();
                $o->setLang($lang);
                $o->setArc($arc);
                $o->setMsbt($msbt);
                $o->setPosicao($pos);
                $o->getLerDoArquivoTmp();
                if ($o->getLang() == "pt_BR") {
                    $sm->assign("DialogoPT_BR", $o->getValorFormatadoUtf8());
                }
                array_push($msgs, $o);
            }
            $sm->assign("msgs", $msgs);
            $sm->assign("pos", $pos);
        }
    }
}
$sm->display("traduzir.tpl");
?>
