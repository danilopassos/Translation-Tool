<?php
/*
    * Codigo pra extrair todos os dialogos 
    * em um html, util pra procupar a posição
    * de textos, por feramentas de pesquisa(CTRL + F)
    * 
    * dica: melhor chamar isso via cliente php, porque 
    * é bem lento mais de 5 minutos para um idioma inteiro
    */

require_once 'core/Arc.php';
require_once 'core/Dialogo.php';
require_once 'core/Extrair.php';
require_once 'core/Lang.php';
require_once 'core/Formatacao.php';
require_once 'core/util.php';

$lang = "pt_BR";
//$lang = "en_US";

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
<?php
    foreach (ExtArc::getFileNames() as $arc) {
        foreach (ExtArc::getFileNamesInArc($arc) as $msbt) {
            foreach (ExtArc::getFileNamesInArcSubs($msbt) as $pos) {
                echo "\n<br>" . $arc . "/" . $msbt . "/" . $pos;
                $o = new Dialogo($arc, $msbt, $pos, $lang);
                echo "\n<br>" . $o->getDialogoHtml(false) . "<br>\n\n";
            }
        }
    }
?>
    </body>
</html>