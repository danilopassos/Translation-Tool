<?php
require_once 'core/Arc.php';
$quero ="";
if(isset($_GET['quero'])){
    $quero = $_GET['quero'];
}



if($quero == ""){
    $r = array();
    foreach(ExtArc::getFileNames() as $arc){
        $a = array();
        $a["id"] = $arc;
        $a["text"] = $arc;
        $a["children"] = array();
        foreach (ExtArc::getFileNamesInArc($arc) as $msbt){
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

//if($quero == "arc")
//echo json_encode(ExtArc::getFileNamesInArc($param));

if($quero == "pos"){
    $r =  array();
    foreach (ExtArc::getFileNamesInArcSubs($_GET["msbt"]) as $pos){
        $p = array();
        $p['id'] = $pos;
        $p['text'] = $pos;
        $p["leaf"] = true;
        
        array_push($r, $p);
    }

    echo json_encode($r);
}
?>
