<?php

require_once 'db/dbConnection.php';
require_once 'core/util.php';
require_once 'core/Formatacao.php';

abstract class mDialogo extends dbConnection {

    private $arc;  //de qual arquivo arc ela pertence
    private $msbt; // de qual msbt ela pertence
    //é usado a posição como nome de arquivo, porque a chave possui caracteres
    //não permetidos nos sistemas de arquivo.
    private $posicao; //posicao dentro do msbt
    private $nome;   //nome usado dentro do msbt
    protected $dialogoBase64; //conteudo binario formatado em base64//

    public function getNumeroLinhas() {
        $linhas = explode("\n", $this->getDialogoUtf8());
        
        $i = 1; //inclemento por garantia
        if(count($linhas) > 3){
          $i++;  
        }
        if(count($linhas) > 6){
          $i++;  
        }
        if(count($linhas) > 9){
          $i++;  
        }
        
        return count($linhas) + $i;
    }

    public function getArc() {
        return $this->arc;
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

    public function getPosicao() {
        return $this->posicao;
    }

    public function setPosicao($numero) {
        $this->posicao = $numero;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($value) {
        $this->nome = $value;
    }

    public function getDialogoBase64() {
        return $this->dialogoBase64;
    }

    public function setDialogoBase64($dialogoBase64) {
        $this->dialogoBase64 = $dialogoBase64;
    }

    public function getDialogoBinario() {
        return base64_decode($this->dialogoBase64);
    }

    public function setDialogoBinario($dialogoBinario) {
        $this->dialogoBase64 = base64_encode($dialogoBinario);
    }

    public function getDialogoUtf8() {
        return mDialogo::dialogoBinarioParaUtf8(base64_decode($this->dialogoBase64));
    }

    public function setDialogoUtf8($utf8) {
        $this->dialogoBase64 = base64_encode(mDialogo::dialogoUtf8paraBinario($utf8));
    }

    public function getDialogoHtml() {
        $html = base64_decode($this->dialogoBase64);    
                
        $html = mDialogo::dialogoBinarioParaUtf8($html,true);
        $html = str_replace("\n", "<br/>", $html);
        
        #para evitar bugs em textos mal formatados
        $html .= "</font>";
        return $html;
    }

    public static function hexToTag($hex, $paraHtml) {
        if ($paraHtml) {
            $f = new Formatacao($hex);
            return $f->getHTML();
         
        } else {
            
            $f = new Formatacao($hex);
            if ($f->getTag() == null) {
                return "[0x".$hex."]";
            } else {
                return "[" . $f->getTag()."]";
            }
        }
    }
    public static function tagToHex($tag){
        if(substr($tag, 0, 2) == "0x"){
            return substr($tag, 2);
        }else{
            return Formatacao::getHexOf($tag);
        }
    }
    

    public static function dialogoBinarioParaUtf8($bin, $emHtml= false) {
        $utf8 = "";

        //o -2 revove os dois bytes de eof
        for ($offset = 0; $offset < strlen($bin) - 2; $offset += 2) {

            if (bin2hex(substr($bin, $offset, 2)) === "000e") {
                if (
                        ( bin2hex(substr($bin, $offset, 6)) === "000e00010009") ||
                        ( bin2hex(substr($bin, $offset, 6)) === "000e0001000a") ||
                        ( bin2hex(substr($bin, $offset, 6)) === "000e0001000b") ||
                        ( bin2hex(substr($bin, $offset, 6)) === "000e0001000c") ||
                        ( bin2hex(substr($bin, $offset, 6)) === "000e00010012")
                ) {
                    $utf8 .=   mDialogo::hexToTag(bin2hex(substr($bin, $offset, 12)), $emHtml) ;
                    $offset += (12 - 2);
                } elseif (( bin2hex(substr($bin, $offset, 6)) === "000e0001000f")) {
                    $utf8 .=  mDialogo::hexToTag(bin2hex(substr($bin, $offset, 8)), $emHtml) ;
                    $offset += (8 - 2);
                } else {
                    $utf8 .=  mDialogo::hexToTag(bin2hex(substr($bin, $offset, 10)), $emHtml);
                    $offset += (10 - 2);
                }
            } elseif (bin2hex(substr($bin, $offset, 2)) === "abab") {
                /* são restos do containeer devem ser iginorados */
            } elseif (bin2hex(substr($bin, $offset, 2)) === "0000") {
                $utf8 .=  mDialogo::hexToTag("0000", $emHtml) ;
            } elseif (bin2hex(substr($bin, $offset, 2)) === "ffff") {
                $utf8 .=  mDialogo::hexToTag("ffff", $emHtml) ;
            } else {
                $utf8 .= utf16ToUtf8($bin[$offset] . $bin[$offset + 1]);
            }
        }

        return $utf8;
    }

    public static function dialogoUtf8paraBinario($utf8) {
        $bin = "";
        $utf8Temp = null;
        for ($offset = 0; $offset < strlen($utf8); $offset += 1) {

            if ($utf8[$offset] == "[") {
                $offset++;

                $temp = "";

                while ($utf8[$offset] != "]") {
                    $temp .= $utf8[$offset];
                    $offset++;
                    if ($offset > strlen($utf8)) {
                        die("\$offset > strlen(\$utf8)");
                    }
                }
                if (!($utf8Temp === null)) {
                    $bin .= utf8ToUtf16($utf8Temp);
                    $utf8Temp = null;
                }
                $temp = mDialogo::tagToHex($temp);
                $bin .= myHex2bin($temp);
            } else {
                $utf8Temp .= $utf8[$offset];
            }
        }

        if (!($utf8Temp === null)) {
            $bin .= utf8ToUtf16($utf8Temp);
        }

        #eof - end of file
        $bin .= myHex2bin("0000");

        return $bin;
    }

}



?>