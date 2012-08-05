<?php
require_once 'core/Arc.php';
$quero ="";
if(isset($_GET['quero'])){
    $quero = $_GET['quero'];
}


if($quero == ""){
    $r = array();
    foreach(Arc::getFileNames() as $arc){
        $a = array();
        $a["id"] = $arc;
        $a["text"] = $arc;
        $a["children"] = array();
        foreach (Arc::getFileNamesInArc($arc) as $msbt){
            $m = array();
            $m["id"] = $msbt;
            $m["text"] = $msbt;
            $m["leaf"] = true;
            array_push($a["children"], $m);
        }
        array_push($r, $a);
    }
    echo json_encode($r);    
}

if($quero == "pos"){
$o = new Dialog();
$msbt = $_GET["msbt"];
    $sql = "SELECT 
        tt_dialog_lang.dialog_id        `pos`,
        tt_dialog_lang.dialog_id        `id`,
        tt_dialog.`name`                `name`,
        tt_dialog_lang.dialog_status_id `status`,
        tt_dialog_lang.last_updated     `em`
        FROM tt_dialog_lang 
        inner join tt_dialog on (tt_dialog_lang.dialog_id = tt_dialog.dialog_id) 
        inner join tt_section on (tt_dialog.section_id = tt_section.section_id) 
        WHERE 
        tt_dialog_lang.lang_id = 7  and 
        tt_section.section_name='" . $msbt . "' and 
        tt_dialog_lang.dialog <> ''
        order by tt_dialog_lang.dialog_id";    

    $ret = $o->runSelect($sql);
    $r =  array();
    foreach ($ret as $row){
            array_push($r, $row);
    }

    echo json_encode($r);
}
?>
