<?php

require_once "sm.php";
require_once 'core/util.php';
require_once 'core/Lang.php';
require_once 'core/Arc.php';
require_once 'core/DialogoOriginal.php';
require_once 'core/DialogoTraducao.php';

$sm->assign("En_US", null );
$sm->assign("arc", null);
$sm->assign("msbt", null);
$sm->assign("msbts", null);
$sm->assign("poss", null);
$sm->assign("dialogosTraduzidos",null);
$sm->assign("dialogosOriginais", null);
$sm->assign("pos", null);
$sm->assign("arcs", ExtArc::getFileNames());

if (isset($_GET["arc"])) {
    $arc = $_GET["arc"];
    $sm->assign("arc", $arc);
    $sm->assign("msbts", ExtArc::getFileNamesInArc($arc));
    if (isset($_GET["msbt"])) {
        $msbt = $_GET["msbt"];
        $sm->assign("msbt", $msbt);
        $sm->assign("poss", ExtArc::getFileNamesInArcSubs($msbt));
        if (isset($_GET["pos"])) {
            $pos = $_GET["pos"];
            while(strlen($pos) < 3){
                $pos =  "0" . $pos;
            }
            $dialogosOriginais = array();
            foreach (Lang::getLangs() as $lang) {
                $o = new DialogoOriginal($arc, $msbt, $pos, $lang);
                 array_push($dialogosOriginais, $o);
                 if($lang == "en_US"){
                     $sm->assign("En_US", $o );
                 }
            }
            $sm->assign("dialogosOriginais", $dialogosOriginais);
            $sm->assign("dialogosTraduzidos", DialogoTraducao::getTodasTradução($arc, $msbt, $pos));
            $sm->assign("pos", $pos);
        }
    }
}
$sm->display("traduzir.tpl");
?>
