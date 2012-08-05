<?php

/*
 * Classe destinada a manipulação dos arquivos *.arc contidos na iso
 * 
 */
require_once 'core/util.php';
require_once 'core/Msbt.php';
require_once 'core/Lang.php';

class Arc {

    private static $files = array(
        "0-Common.arc", 
        "1-Town.arc", 
        "2-Forest.arc", 
        "3-Mountain.arc", 
        "4-Desert.arc", 
        "5-CenterField.arc"
        );

    public static function getFileNames() {
        return self::$files;
    }

    public static function getFileNamesInArc($arc) {
        $Iso = array();

        $Iso["0-Common.arc"] = array();
        array_push($Iso["0-Common.arc"], "001-Action.msbt");
        array_push($Iso["0-Common.arc"], "002-System.msbt");
        array_push($Iso["0-Common.arc"], "003-ItemGet.msbt");
        array_push($Iso["0-Common.arc"], "004-Object.msbt");
        array_push($Iso["0-Common.arc"], "005-Tutorial.msbt");
        array_push($Iso["0-Common.arc"], "006-1KenseiNormal.msbt");
        array_push($Iso["0-Common.arc"], "006-2KenseiNormal.msbt");
        array_push($Iso["0-Common.arc"], "006-3KenseiNormal.msbt");
        array_push($Iso["0-Common.arc"], "006-4KenseiNormal.msbt");
        array_push($Iso["0-Common.arc"], "006-5KenseiNormal.msbt");
        array_push($Iso["0-Common.arc"], "006-6KenseiNormal.msbt");
        array_push($Iso["0-Common.arc"], "006-7KenseiNormal.msbt");
        array_push($Iso["0-Common.arc"], "006-8KenseiNormal.msbt");
        array_push($Iso["0-Common.arc"], "006-9KenseiNormal.msbt");
        array_push($Iso["0-Common.arc"], "006-KenseiNormal.msbt");
        array_push($Iso["0-Common.arc"], "007-MapText.msbt");
        array_push($Iso["0-Common.arc"], "008-Hint.msbt");
        array_push($Iso["0-Common.arc"], "word.msbt");

        $Iso["1-Town.arc"] = array();
        array_push($Iso["1-Town.arc"], "100-Town.msbt");
        array_push($Iso["1-Town.arc"], "101-Shop.msbt");
        array_push($Iso["1-Town.arc"], "102-Zelda.msbt");
        array_push($Iso["1-Town.arc"], "103-DaiShinkan.msbt");
        array_push($Iso["1-Town.arc"], "104-Rival.msbt");
        array_push($Iso["1-Town.arc"], "105-Terry.msbt");
        array_push($Iso["1-Town.arc"], "106-DrugStore.msbt");
        array_push($Iso["1-Town.arc"], "107-Kanban.msbt");
        array_push($Iso["1-Town.arc"], "108-ShinkanA.msbt");
        array_push($Iso["1-Town.arc"], "109-TakeGoron.msbt");
        array_push($Iso["1-Town.arc"], "110-DivingGame.msbt");
        array_push($Iso["1-Town.arc"], "111-FortuneTeller.msbt");
        array_push($Iso["1-Town.arc"], "112-Trustee.msbt");
        array_push($Iso["1-Town.arc"], "113-RemodelStore.msbt");
        array_push($Iso["1-Town.arc"], "114-Friend.msbt");
        array_push($Iso["1-Town.arc"], "115-Town2.msbt");
        array_push($Iso["1-Town.arc"], "116-InsectGame.msbt");
        array_push($Iso["1-Town.arc"], "117-Pumpkin.msbt");
        array_push($Iso["1-Town.arc"], "118-Town3.msbt");
        array_push($Iso["1-Town.arc"], "119-Captain.msbt");
        array_push($Iso["1-Town.arc"], "120-Nushi.msbt");
        array_push($Iso["1-Town.arc"], "121-AkumaKun.msbt");
        array_push($Iso["1-Town.arc"], "122-Town4.msbt");
        array_push($Iso["1-Town.arc"], "123-Town5.msbt");
        array_push($Iso["1-Town.arc"], "124-Town6.msbt");
        array_push($Iso["1-Town.arc"], "125-D3.msbt");
        array_push($Iso["1-Town.arc"], "150-Siren.msbt");
        array_push($Iso["1-Town.arc"], "199-Demo.msbt");

        $Iso["2-Forest.arc"] = array();
        array_push($Iso["2-Forest.arc"], "200-Forest.msbt");
        array_push($Iso["2-Forest.arc"], "201-ForestD1.msbt");
        array_push($Iso["2-Forest.arc"], "202-ForestD2.msbt");
        array_push($Iso["2-Forest.arc"], "203-ForestF2.msbt");
        array_push($Iso["2-Forest.arc"], "204-ForestF3.msbt");
        array_push($Iso["2-Forest.arc"], "250-ForestSiren.msbt");
        array_push($Iso["2-Forest.arc"], "251-Salvage.msbt");
        array_push($Iso["2-Forest.arc"], "299-Demo.msbt");

        $Iso["3-Mountain.arc"] = array();
        array_push($Iso["3-Mountain.arc"], "300-Mountain.msbt");
        array_push($Iso["3-Mountain.arc"], "301-MountainD1.msbt");
        array_push($Iso["3-Mountain.arc"], "302-Anahori.msbt");
        array_push($Iso["3-Mountain.arc"], "303-MountainF2.msbt");
        array_push($Iso["3-Mountain.arc"], "304-MountainD2.msbt");
        array_push($Iso["3-Mountain.arc"], "305-MountainF3.msbt");
        array_push($Iso["3-Mountain.arc"], "350-MountainSiren.msbt");
        array_push($Iso["3-Mountain.arc"], "351-Salvage.msbt");
        array_push($Iso["3-Mountain.arc"], "399-Demo.msbt");

        $Iso["4-Desert.arc"] = array();
        array_push($Iso["4-Desert.arc"], "400-Desert.msbt");
        array_push($Iso["4-Desert.arc"], "401-DesertD2.msbt");
        array_push($Iso["4-Desert.arc"], "402-DesertF2.msbt");
        array_push($Iso["4-Desert.arc"], "403-DesertD1.msbt");
        array_push($Iso["4-Desert.arc"], "404-DesertF3.msbt");
        array_push($Iso["4-Desert.arc"], "405-DesertD2Clear.msbt");
        array_push($Iso["4-Desert.arc"], "406-TrolleyRace.msbt");
        array_push($Iso["4-Desert.arc"], "450-DesertSiren.msbt");
        array_push($Iso["4-Desert.arc"], "451-Salvage.msbt");
        array_push($Iso["4-Desert.arc"], "460-RairyuMinigame.msbt");
        array_push($Iso["4-Desert.arc"], "499-Demo.msbt");

        $Iso["5-CenterField.arc"] = array();
        array_push($Iso["5-CenterField.arc"], "500-CenterField.msbt");
        array_push($Iso["5-CenterField.arc"], "501-Inpa.msbt");
        array_push($Iso["5-CenterField.arc"], "502-CenterFieldBack.msbt");
        array_push($Iso["5-CenterField.arc"], "503-Goron.msbt");
        array_push($Iso["5-CenterField.arc"], "510-Salvage.msbt");
        array_push($Iso["5-CenterField.arc"], "599-Demo.msbt");

        return $Iso[$arc];
    }

    public static function getFileNamesInArcSubs($msbt) {
        $quantidadeDeDialogos = array();
        $quantidadeDeDialogos["001-Action.msbt"] = 254;
        $quantidadeDeDialogos["002-System.msbt"] = 152;
        $quantidadeDeDialogos["003-ItemGet.msbt"] = 802;
        $quantidadeDeDialogos["004-Object.msbt"] = 39;
        $quantidadeDeDialogos["005-Tutorial.msbt"] = 370;
        $quantidadeDeDialogos["006-1KenseiNormal.msbt"] = 205;
        $quantidadeDeDialogos["006-2KenseiNormal.msbt"] = 107;
        $quantidadeDeDialogos["006-3KenseiNormal.msbt"] = 248;
        $quantidadeDeDialogos["006-4KenseiNormal.msbt"] = 9;
        $quantidadeDeDialogos["006-5KenseiNormal.msbt"] = 151;
        $quantidadeDeDialogos["006-6KenseiNormal.msbt"] = 192;
        $quantidadeDeDialogos["006-7KenseiNormal.msbt"] = 49;
        $quantidadeDeDialogos["006-8KenseiNormal.msbt"] = 17;
        $quantidadeDeDialogos["006-9KenseiNormal.msbt"] = 95;
        $quantidadeDeDialogos["006-KenseiNormal.msbt"] = 51;
        $quantidadeDeDialogos["007-MapText.msbt"] = 272;
        $quantidadeDeDialogos["008-Hint.msbt"] = 167;
        $quantidadeDeDialogos["word.msbt"] = 32;
        $quantidadeDeDialogos["100-Town.msbt"] = 86;
        $quantidadeDeDialogos["101-Shop.msbt"] = 40;
        $quantidadeDeDialogos["102-Zelda.msbt"] = 52;
        $quantidadeDeDialogos["103-DaiShinkan.msbt"] = 41;
        $quantidadeDeDialogos["104-Rival.msbt"] = 12;
        $quantidadeDeDialogos["105-Terry.msbt"] = 54;
        $quantidadeDeDialogos["106-DrugStore.msbt"] = 82;
        $quantidadeDeDialogos["107-Kanban.msbt"] = 85;
        $quantidadeDeDialogos["108-ShinkanA.msbt"] = 113;
        $quantidadeDeDialogos["109-TakeGoron.msbt"] = 57;
        $quantidadeDeDialogos["110-DivingGame.msbt"] = 47;
        $quantidadeDeDialogos["111-FortuneTeller.msbt"] = 71;
        $quantidadeDeDialogos["112-Trustee.msbt"] = 37;
        $quantidadeDeDialogos["113-RemodelStore.msbt"] = 130;
        $quantidadeDeDialogos["114-Friend.msbt"] = 42;
        $quantidadeDeDialogos["115-Town2.msbt"] = 263;
        $quantidadeDeDialogos["116-InsectGame.msbt"] = 45;
        $quantidadeDeDialogos["117-Pumpkin.msbt"] = 201;
        $quantidadeDeDialogos["118-Town3.msbt"] = 154;
        $quantidadeDeDialogos["119-Captain.msbt"] = 51;
        $quantidadeDeDialogos["120-Nushi.msbt"] = 15;
        $quantidadeDeDialogos["121-AkumaKun.msbt"] = 53;
        $quantidadeDeDialogos["122-Town4.msbt"] = 78;
        $quantidadeDeDialogos["123-Town5.msbt"] = 111;
        $quantidadeDeDialogos["124-Town6.msbt"] = 19;
        $quantidadeDeDialogos["125-D3.msbt"] = 30;
        $quantidadeDeDialogos["150-Siren.msbt"] = 27;
        $quantidadeDeDialogos["199-Demo.msbt"] = 215;
        $quantidadeDeDialogos["200-Forest.msbt"] = 190;
        $quantidadeDeDialogos["201-ForestD1.msbt"] = 67;
        $quantidadeDeDialogos["202-ForestD2.msbt"] = 20;
        $quantidadeDeDialogos["203-ForestF2.msbt"] = 193;
        $quantidadeDeDialogos["204-ForestF3.msbt"] = 53;
        $quantidadeDeDialogos["250-ForestSiren.msbt"] = 29;
        $quantidadeDeDialogos["251-Salvage.msbt"] = 17;
        $quantidadeDeDialogos["299-Demo.msbt"] = 41;
        $quantidadeDeDialogos["300-Mountain.msbt"] = 116;
        $quantidadeDeDialogos["301-MountainD1.msbt"] = 32;
        $quantidadeDeDialogos["302-Anahori.msbt"] = 49;
        $quantidadeDeDialogos["303-MountainF2.msbt"] = 125;
        $quantidadeDeDialogos["304-MountainD2.msbt"] = 65;
        $quantidadeDeDialogos["305-MountainF3.msbt"] = 29;
        $quantidadeDeDialogos["350-MountainSiren.msbt"] = 27;
        $quantidadeDeDialogos["351-Salvage.msbt"] = 14;
        $quantidadeDeDialogos["399-Demo.msbt"] = 46;
        $quantidadeDeDialogos["400-Desert.msbt"] = 112;
        $quantidadeDeDialogos["401-DesertD2.msbt"] = 57;
        $quantidadeDeDialogos["402-DesertF2.msbt"] = 112;
        $quantidadeDeDialogos["403-DesertD1.msbt"] = 4;
        $quantidadeDeDialogos["404-DesertF3.msbt"] = 69;
        $quantidadeDeDialogos["405-DesertD2Clear.msbt"] = 17;
        $quantidadeDeDialogos["406-TrolleyRace.msbt"] = 38;
        $quantidadeDeDialogos["450-DesertSiren.msbt"] = 27;
        $quantidadeDeDialogos["451-Salvage.msbt"] = 8;
        $quantidadeDeDialogos["460-RairyuMinigame.msbt"] = 116;
        $quantidadeDeDialogos["499-Demo.msbt"] = 36;
        $quantidadeDeDialogos["500-CenterField.msbt"] = 129;
        $quantidadeDeDialogos["501-Inpa.msbt"] = 134;
        $quantidadeDeDialogos["502-CenterFieldBack.msbt"] = 33;
        $quantidadeDeDialogos["503-Goron.msbt"] = 81;
        $quantidadeDeDialogos["510-Salvage.msbt"] = 7;
        $quantidadeDeDialogos["599-Demo.msbt"] = 191;
        
        $r = array();
        for($i=0; $i<$quantidadeDeDialogos[$msbt]; $i++){
            $v = $i;
            while (strlen($v) < 3){
                $v = "0".$v;
            }
            
            $r[$i] = $v;
        }
        return $r;
    }

    static function rip($lang, $folder, $fileName, $folderOut) {



        $handle = fopen($folder . $fileName, "r");
        $fileBin = fread($handle, filesize($folder . $fileName));
        #fclose($file_arc);

        $nr_sub_arquivos = 1;
        $sub_arquivos_nome = array();
        $sub_arquivos_offset_nome = array();
        $sub_arquivos_offset_arquivos = array();
        $sub_arquivos_tamanho = array();

        $offset = hexDec("0x38");
        while (true) {
            $sub_arquivos_offset_nome[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
            $offset += 4;
            $sub_arquivos_offset_arquivos[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
            $offset += 4;
            $sub_arquivos_tamanho[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
            $offset += 4;

            if (bin2Hex(substr($fileBin, $offset, 1)) == "01") {
                $nr_sub_arquivos++;
                $offset += 12;
                $sub_arquivos_offset_nome[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
                $offset += 4;
                $sub_arquivos_offset_arquivos[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
                $offset += 4;
                $sub_arquivos_tamanho[$nr_sub_arquivos] = bin2Hex(substr($fileBin, $offset, 4));
                $offset += 4;
                break;
            } else {
                $nr_sub_arquivos++;
            }
        }

        //localiza apenas o nome dos sub arquivos
        $offset_nomes = $offset;
        for ($i = 1; $i <= $nr_sub_arquivos; $i++) {
            $sub_arquivos_nome[$i] = "";
            $pos = $offset_nomes + hexDec($sub_arquivos_offset_nome[$i]);
            while (true) {
                $caracter = substr($fileBin, $pos, 1);
                if ($caracter == myHex2bin("00")) {
                    break;
                } else {
                    $sub_arquivos_nome[$i] .= $caracter;
                    $pos++;
                }
            }
        }

        //cria o diretorio de saida caso ainda não exista

        if (mkdir($folderOut, 0, true)) {
            printLog("pasta de saida: " . $folderOut);

            //grava sub arquios
            for ($i = 1; $i <= $nr_sub_arquivos; $i++) {

                gravarArquivo($folderOut . $sub_arquivos_nome[$i], substr($fileBin, hexDec($sub_arquivos_offset_arquivos[$i]), hexDec($sub_arquivos_tamanho[$i])));
            }

            //menssage final
            printLog("\nExtraido " . $nr_sub_arquivos . " arquivos.");
        } else {
            printLog("erro criando pasta de saida: " . $folderOut);
        }
    }

    public static function remount($langBase, $arc) {
        $langBase = new Lang("$langBase");
        $fileBase = getDirROOT() . $langBase->getRegion() . DIRECTORY_SEPARATOR .
                "Object" . DIRECTORY_SEPARATOR . $langBase .
                DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . $arc;

        $folderBase = getDirTMP() . $langBase . DIRECTORY_SEPARATOR . $arc . ".d" . DIRECTORY_SEPARATOR;

        $filePt_BR = getDirTMP() . "pt_BR" . DIRECTORY_SEPARATOR . $arc;
        $folderPt_BR = $filePt_BR . ".d" . DIRECTORY_SEPARATOR;

        $handle = fopen($fileBase, "r");
        $fileBin = fread($handle, filesize($fileBase));


        $inicio = substr($fileBin, 0, 56);

        $mensages = "";
        $nomes = getFiles($folderBase, "");
        $ponteiroAbsolutoPrimeiroArquivo = hexDec(bin2Hex(substr($fileBin, 12, 4)));
        $ponteiroAbsoluto = $ponteiroAbsolutoPrimeiroArquivo;
        for ($i = 0; $i < (count($nomes) - 1); $i++) {

            $nome = $nomes[$i];
            if (file_exists($folderPt_BR . $nome)) {
                $handle = fopen($folderPt_BR . $nome, "r");
            } else {
                $handle = fopen($folderBase . $nome, "r");
            }
            $msg = fread($handle, filesize($fileBase));
            $mensages .= $msg;

            $inicio .= substr($fileBin, strlen($inicio), 4);
            $inicio .= myInt2bin($ponteiroAbsoluto);
            $ponteiroAbsoluto += strlen($msg);
            $inicio .= myInt2bin(strlen($msg));
        }

        $inicio .= substr($fileBin, strlen($inicio), 16);

        $handle = fopen($folderBase . "zev.dat", "r");
        $msg = fread($handle, filesize($fileBase));
        $mensages .= $msg;

        $inicio .= myInt2bin($ponteiroAbsoluto);
        $inicio .= myInt2bin(strlen($msg));
        $inicio .= substr($fileBin, strlen($inicio), $ponteiroAbsolutoPrimeiroArquivo - strlen($inicio));
        $arquivivoFinal = $inicio . $mensages;
        gravarArquivo($filePt_BR, $arquivivoFinal);
    }

}

?>
