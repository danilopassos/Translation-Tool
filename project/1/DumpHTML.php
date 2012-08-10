<?php

require_once 'core/Arc.php';
require_once 'core/Dialog.php';
require_once 'core/Extrair.php';
require_once 'core/Lang.php';
require_once 'core/Format.php';
require_once 'core/util.php';


?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
        <title> dump do idioma <?php echo $lang; ?> feito em <?php echo getdate(); ?> </title>

        <style>
            .htmlpreview:hover{
                background-color: black;
                color: white;
            }
        </style>

    </head>

    <body>
        <pre>
            <?php
            if(isset($_GET["lang"])){
                $lang = $_GET["lang"];
            }else{
                $lang = "pt_BR"; 
            }

            $o = new Dialog();
            $sql = "SELECT * 
            FROM  `tt_dialog_lang` 
            WHERE  `lang_id` =" . Lang::getId($lang);

            $r = $o->runSelect($sql);

            $cont = 0;
            foreach (Arc::getFileNames() as $arc) {
                foreach (Arc::getFileNamesInArc($arc) as $msbt) {
                    foreach (Arc::getFileNamesInArcSubs( $msbt) as $pos) { 
            //            echo "\n " . ($r[$cont]['dialog_id']) ;
                        echo "\t\n " . $arc ."/". $msbt."/". $pos . "  id: " . ($r[$cont]['dialog_id']);

                        $o = new Dialog();
                        $o->setDialogTag($r[$cont]['dialog']);

             //           echo "\n" . $o->getDialogTagHex();
                        echo "\n" . $o->getDialogHtml();


                        $cont++;
                    }
                }
            }
            ?>
        </pre>
    </body>
</html>