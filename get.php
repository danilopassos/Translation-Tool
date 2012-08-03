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
    foreach (Dialogo::getArray($_GET["msbt"], "pt_BR") as $d){
        if(!$d->isDialogoVazil()){
            $p = array();
            $p['id'] = $d->getPosicao();
            $p['POS'] = $d->getPosicao();
            $p['Nome'] = $d->getNome();
            if($d->isRevisado()){
                $p["Estado"] = 'ok';
            }else{
                $p["Estado"] = 'no_ok';
            }
            $p["por"] = Usuario::getName();
            $p["em"] = '' ;

            array_push($r, $p);
        }
    }

    echo json_encode($r);
}
?>
