<?php

require_once 'db/dbConnection.php';
require_once 'core/util.php';

class mDicionario extends dbConnection {

    protected $valorFormatadoUtf8; //garda a messagem 
    protected $lang; //idioma da mensagem
    protected $arc;  //de qual arquivo arc ela pertence
    protected $msbt; // de qual msbt ela pertence
    //é usado a posição como nome de arquivo, porque a chave possui caracteres
    //não permetidos nos sistemas de arquivo.
    protected $posicao; //posicao dentro do msbt
    protected $chave;   //nome usado dentro do msbt

    public function getPosicao() {
        return $this->posicao;
    }

    public function setLang($lang) {
        $this->lang = $lang;
    }

    public function setPosicao($numero) {
        $this->posicao = $numero;
    }

    public function getChave() {
        return $this->chave;
    }

    public function setChave($value) {
        $this->chave = $value;
    }

    public function getValorFormatadoUtf8() {
        return $this->valorFormatadoUtf8;
    }

    public function setValorFormatadoUtf8($value) {
        $this->valorFormatadoUtf8 = $value;
    }

    public function getLang() {
        return $this->lang;
    }

    public function getLangName() {
        return Lang::getNameLang($this->lang);
    }

    public function getArc() {
        return $this->msbt;
    }

    public function setArc($arc) {
        $this->arc = $arc;
    }

    public function getMsbt() {
        return $this->msbt;
    }

    public function setMsbt($nome) {
        $this->msbt = $nome;
    }

    public static function formatoBinarioParaFormatoUtf8($bin) {
        $utf8 = "";

        for ($offset = 0; $offset < strlen($bin); $offset += 2) {

            if (bin2hex(substr($bin, $offset, 2)) === "000e") {
                if (
                        ( bin2hex(substr($bin, $offset, 6)) === "000e00010009") ||
                        ( bin2hex(substr($bin, $offset, 6)) === "000e0001000a") ||
                        ( bin2hex(substr($bin, $offset, 6)) === "000e0001000b") ||
                        ( bin2hex(substr($bin, $offset, 6)) === "000e0001000c") ||
                        ( bin2hex(substr($bin, $offset, 6)) === "000e00010012")
                ) 
                {
                    $utf8 .= "[" . bin2hex(substr($bin, $offset, 12)) . "]";
                    $offset += (12 - 2);
                }elseif( ( bin2hex(substr($bin, $offset, 6)) === "000e0001000f") ){
                    $utf8 .= "[" . bin2hex(substr($bin, $offset, 8)) . "]";
                    $offset += (8 - 2);
                }
                else{
                    $utf8 .= "[" . bin2hex(substr($bin, $offset, 10)) . "]";
                    $offset += (10 - 2);
                }
            } 
            elseif (bin2hex(substr($bin, $offset, 2)) === "abab") {
                /* são restos do containeer devem ser iginorados */
            }
            elseif (bin2hex(substr($bin, $offset, 2)) === "0000") {
                $utf8 .= "[0000]";
 
            } 
            elseif (bin2hex(substr($bin, $offset, 2)) === "ffff") {
                $utf8 .= "[ffff]";
 
            } 
            else {
                $utf8 .= utf16ToUtf8($bin[$offset] . $bin[$offset + 1]);
            }
        }

        return $utf8;
    }

    public static function formatoUtf8ParaFormatoBinario($utf8) {
        $bin = "";
        $utf8Temp = null;
        for ($offset = 0; $offset < strlen($utf8); $offset += 1) {

            if ($utf8[$offset] === "[") {
                $offset++;

                $temp = "";

                while (!($utf8[$offset] === "]")) {
                    $temp .= $utf8[$offset];
                    $offset++;
                }
                if (!($utf8Temp === null)) {
                    $bin .= utf8ToUtf16($utf8Temp);
                    $utf8Temp = null;
                }
                
                $bin .= myHex2bin($temp);
            } else {
                $utf8Temp .= $utf8[$offset];
            }
        }

        if (!($utf8Temp === null)) {
            $bin .= utf8ToUtf16($utf8Temp);
        }
        
        //eof - end of file
        //$bin .= myHex2bin("0000");

        return $bin;
    }

    public function getPathTmpFile() {
        return getDirTMP() .
                $this->lang . DIRECTORY_SEPARATOR .
                $this->arc . ".d" . DIRECTORY_SEPARATOR .
                $this->msbt . ".d" . DIRECTORY_SEPARATOR . $this->posicao;
    }

    public function getLerDoArquivoTmp() {
        $file = $this->getPathTmpFile();

        if (file_exists($file)) {
            $handle = fopen($file, "r");
            $fileBin = fread($handle, filesize($file));
            $this->valorFormatadoUtf8 = mDicionario::formatoBinarioParaFormatoUtf8($fileBin);
        } else {
            printLog("Arquivo não encontrado : " . $file);
        }
    }

}

?>