<?php

require_once 'model/mDialogBase.php';
require_once 'core/util.php';
require_once 'core/Format.php';

abstract class mDialog extends mDialogBase {

    public function getPathTmpFile() {
        return getDirTMP() .
                $this->getLang() . DIRECTORY_SEPARATOR .
                $this->getArc() . ".d" . DIRECTORY_SEPARATOR .
                $this->getMsbt() . ".d" . DIRECTORY_SEPARATOR . $this->getPos();
    }

    public function loadDialogBinFronFile() {
        $file = $this->getPathTmpFile();
        
        if (file_exists($file)) {
            $handle = fopen($file, "r");
            $fileBin = fread($handle, filesize($file));
            $this->dialogoBase64 = base64_encode($fileBin);
        } else {
            printLog("Arquivo não encontrado : " . $file);
        }
    }
    
    public function getDialogBin(){
        return self::dialogTagHexToDialogBin($this->getDialogTagHex());
    }

    public function setDialogBin($dialogBin) {
        $this->setDialogTagHex( self::dialogBinToDialogTagHex($dialogBin) );
    }

    public function getDialogTag(){
        return self::replaceTag( $this->getDialogTagHex() ) ;
    }

    public function setDialogTag($dialogTag) {
        $this->setDialogTagHex( self::replaceTag($dialogTag,'hex') );
    }

    public function getDialogHtml($comAlertas = true) {
        $html = $this->getDialogTagHex();            
        $html = self::replaceTag($html,'html');
//         
//        $alertas = "";
//        $linhas = explode("\n", $html);
//        for($i = 0; $i < count($linhas); $i++ ){
//            if( mb_strlen(strip_tags($linhas[$i]),"utf8") > 36){
//                $alertas .= "<p style=\" background-color: red \"> a Linha " . ($i + 1) . " passou de 36 caracteres</p>";
//            }
//        }
//        
        $html = str_replace("\n", "<br/>", $html);
//        
        $html = $this->closeHtmlTags($html);
//        
//        if($comAlertas){
//            $html .= "<br>".$alertas;
//        }
        
        return "<div class=\"htmlpreview\">" . $html . "</div>";
    }
    
    public static function replaceTag($dialogTagIn, $mode = 'tag'){
        $dialogTagOut = "";
        
        $utf8Temp = null;
        
        for ($offset = 0; $offset < strlen($dialogTagIn); $offset += 1) {

            if ($dialogTagIn[$offset] == "[") {
                $offset++;

                $temp = "";

                while ($dialogTagIn[$offset] != "]") {
                    $temp .= $dialogTagIn[$offset];
                    $offset++;
                    if ($offset > strlen($dialogTagIn)) {
                        die("\$offset > strlen(\$utf8)");
                    }
                }
                if (!($utf8Temp === null)) {
                    $dialogTagOut .= $utf8Temp;
                    $utf8Temp = null;
                }
                $temp = self::tagTo($temp, $mode);
                $dialogTagOut .= $temp;
            } else {
                $utf8Temp .= $dialogTagIn[$offset];
            }
        }

        if (!($utf8Temp === null)) {
            $dialogTagOut .= $utf8Temp;
        }
            
        return $dialogTagOut; 
    }


    private function closeHtmlTags($html) {
        $result = "";
        #put all opened tags into an array
        preg_match_all("#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU", $html, $result);
        $openedtags = $result[1];   #put all closed tags into an array
        preg_match_all("#</([a-z]+)>#iU", $html, $result);
        $closedtags = $result[1];
        $len_opened = count($openedtags);
        # all tags are closed
        if (count($closedtags) == $len_opened) {
            return $html;
        }
        $openedtags = array_reverse($openedtags);
        # close tags
        for ($i = 0; $i < $len_opened; $i++) {
            if (!in_array($openedtags[$i], $closedtags)) {
                $html .= "</" . $openedtags[$i] . ">";
            } else {
                unset($closedtags[array_search($openedtags[$i], $closedtags)]);
            }
        }
        return $html;
    }

  
    public static function tagToHex($tag){
        //remove spaces
        $tag = str_replace(" ", "", $tag);
        
        if(substr($tag, 0, 2) == "0x"){
            return substr($tag, 2);
        }else{

        }
    }
    
    public  static function tagTo($tag , $mode="tag"){
        //remove 0x
        if( substr($tag, 0, 2) == "0x"){
            $tag = substr($tag, 2);
        }
        
        if($mode == "tag"){
            $format = new Format($tag);
            $tag = "[" . $format->getTag() . "]";
        }
        if($mode == "html"){
            $format = new Format($tag);
            $tag = $format->getHTML();
        }
        if($mode == "hex"){
            $tag = "[0x" . Format::getHexOf($tag) . "]";
        }
        return $tag;
    }



    public static function dialogBinToDialogTagHex($dialogBin) {
        $dialogTagHex = "";

        //the -2 remove the EOF (0x0000)
        for ($offset = 0; $offset < strlen($dialogBin) - 2; $offset += 2) {

            if (bin2hex(substr($dialogBin, $offset, 2)) === "000e") {
                if (
                        ( bin2hex(substr($dialogBin, $offset, 6)) === "000e00010009") ||
                        ( bin2hex(substr($dialogBin, $offset, 6)) === "000e0001000a") ||
                        ( bin2hex(substr($dialogBin, $offset, 6)) === "000e0001000b") ||
                        ( bin2hex(substr($dialogBin, $offset, 6)) === "000e0001000c") ||
                        ( bin2hex(substr($dialogBin, $offset, 6)) === "000e00010012")
                ) {
                    $dialogTagHex .= "[0x" . (bin2hex(substr($dialogBin, $offset, 12))). "]" ;
                    $offset += (12 - 2);
                } elseif (( bin2hex(substr($dialogBin, $offset, 6)) === "000e0001000f")) {
                    $dialogTagHex .=  "[0x" .(bin2hex(substr($dialogBin, $offset, 8))). "]" ;
                    $offset += (8 - 2);
                } else {
                    $dialogTagHex .=  "[0x" .(bin2hex(substr($dialogBin, $offset, 10))). "]";
                    $offset += (10 - 2);
                }
            } elseif (bin2hex(substr($dialogBin, $offset, 2)) === "abab") {
                /* ignored */
            } elseif (bin2hex(substr($dialogBin, $offset, 2)) === "0000") {
                $dialogTagHex .=  "[0x" .("0000"). "]" ;
            } elseif (bin2hex(substr($dialogBin, $offset, 2)) === "03cd") {
                $dialogTagHex .=  "[0x" .("03cd"). "]" ;
            } elseif (bin2hex(substr($dialogBin, $offset, 2)) === "ffff") {
                $dialogTagHex .= "[0x" .("ffff") . "]" ;
            }else {
                $dialogTagHex .= utf16ToUtf8($dialogBin[$offset] . $dialogBin[$offset + 1]);
            }
        }

        return $dialogTagHex;
    }

    public static function dialogTagHexToDialogBin($dialogTagHex) {
        $dialogBin = "";
        $utf8Temp = null;
        for ($offset = 0; $offset < strlen($dialogTagHex); $offset += 1) {

            if ($dialogTagHex[$offset] == "[") {
                $offset++;

                $temp = "";

                while ($dialogTagHex[$offset] != "]") {
                    $temp .= $dialogTagHex[$offset];
                    $offset++;
                    if ($offset > strlen($dialogTagHex)) {
                        die("\$offset > strlen(\$utf8)");
                    }
                }
                if (!($utf8Temp === null)) {
                    $dialogBin .= utf8ToUtf16($utf8Temp);
                    $utf8Temp = null;
                }
                $temp = self::tagToHex($temp);
                $dialogBin .= myHex2bin($temp);
            } else {
                $utf8Temp .= $dialogTagHex[$offset];
            }
        }

        if (!($utf8Temp === null)) {
            $dialogBin .= utf8ToUtf16($utf8Temp);
        }

        #EOF - end of file
        $dialogBin .= myHex2bin("0000");

        return $dialogBin;
    }

}



?>