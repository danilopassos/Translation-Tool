<?php
die(utf8_decode("isso está desatualizado, e não é mais nessesario"));

require_once 'core/util.php';
require_once 'core/Arc.php';
require_once 'core/Lang.php';
require_once 'core/Dialogo.php';
require_once 'salvar.php';

function traduzir($texto) {
    echo "\n\nChegou para traduzir: \"" . $texto . "\"";

    if ($texto == null) {
        return "";
    } elseif (strlen($texto) < 2) {
        return $texto;
    } elseif ($texto == "  ") {
        return "  ";
    } elseif ($texto == "...") {
        return "...";
    } else {
        $textoPt_BR = "";
        $exec = "sh inc/googleTranslator.sh \"" . $texto . "\"";
        echo "\n" . $exec . "";
        exec($exec, $textoPt_BR);
        echo "\nRetorno \"" . $textoPt_BR[0] . "\"";
        if (isset($textoPt_BR[0])) {
            return $textoPt_BR[0];
        } else {
            return "";
        }
    }
}

$cont = 0;

#$arc = "0-Common.arc";
#$arc = "1-Town.arc";
#$arc = "2-Forest.arc";
#$arc = "3-Mountain.arc";
#$arc = "4-Desert.arc";
$arc = "5-CenterField.arc";

foreach (ExtArc::getFileNamesInArc($arc) as $msbt) {

    foreach (ExtArc::getFileNamesInArcSubs($arc, $msbt) as $pos) {
        $o = new Dialogo();

        $o->setLang(new Lang("es_US"));
        $o->setArc($arc);
        $o->setMsbt($msbt);

        $o->setPosicao($pos);
        $o->getLerDoArquivoTmp();

        $cont++;
        echo "\n\n" . $cont;
        $msgEN = $o->getValorFormatadoUtf8();


        $msgBR = "";
        $utf8Temp = null;
        for ($offset = 0; $offset < strlen($msgEN); $offset += 1) {

            if ($msgEN[$offset] === "[") {
                $offset++;

                $temp = "";

                while (!($msgEN[$offset] === "]")) {
                    $temp .= $msgEN[$offset];
                    $offset++;
                }
                if (!($utf8Temp === null)) {
                    $primeiro = true;
                    foreach (explode("\n", $utf8Temp) as $linha) {
                        if ($primeiro) {
                            $msgBR .= traduzir($linha);
                            $primeiro = false;
                        } else {
                            $msgBR .= "\n" . traduzir($linha);
                        }
                    }
                    $utf8Temp = null;
                }

                $msgBR .= "[" . $temp . "]";
            } else {
                $utf8Temp .= $msgEN[$offset];
            }
        }

        if (!($utf8Temp === null)) {
            $primeiro = true;
            foreach (explode("\n", $utf8Temp) as $linha) {
                if ($primeiro) {
                    $msgBR .= traduzir($linha);
                    $primeiro = false;
                } else {
                    $msgBR .= "\n" . traduzir($linha);
                }
            }
        }

        echo "\n" . $msgBR;

        salvar01($arc, $msbt, $pos, $msgBR);
    }
}

echo "\n\n";



