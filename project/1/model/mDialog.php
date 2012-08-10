<?php
require_once(dirname(__FILE__) .'/../model/mDialogBase.php');
require_once(dirname(__FILE__) .'/../core/util.php');
require_once(dirname(__FILE__) .'/../core/Format.php');

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
        return self::dialogTagToDialogBin($this->getDialogTag());
    }

    public function setDialogBin($dialogBin) {
        $this->setDialogTagHex( self::dialogBinToDialogTag($dialogBin) );
    }

    public function getDialogTagHex(){
        return self::replaceTag( $this->getDialogTag(), 'hex' ) ;
    }


    public function getDialogHtml() {
        $html = $this->getDialogTag();            
        $html = self::replaceTag($html,'html');      
        
        $html = str_replace("\n", "<br/>", $html);
        
        $html = $this->closeHtmlTags($html);
        
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

    
    public  static function tagTo($tag , $mode="tag"){
//        echo "\nTag:" . $tag;

        //remove 0x
        if( substr($tag, 0, 2) == "0x"){
            $tag = substr($tag, 2);
        }
        
        if($mode == "tag"){
            die("not implemented");
            #$tag = "[" . $format->getTag() . "]";
        }
        if($mode == "html"){
//            echo "\nTag:" . $tag; 
//            echo "\nHtml:" . Format::getTagToHtml($tag);
            $tag = Format::getTagToHtml($tag);
        }
        if($mode == "hex"){
//            echo "\nTag:" . $tag; 
//            echo "\nHex:" . Format::getTagToHex($tag);
            $tag = "[0x" . Format::getTagToHex($tag) . "]";
        }
        return $tag;
    }



    public static function dialogBinToDialogTag($dialogBin) {
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
                    $dialogTagHex .= "[0x" . tagTo(bin2hex(substr($dialogBin, $offset, 12))). "]" ;
                    $offset += (12 - 2);
                } elseif (( bin2hex(substr($dialogBin, $offset, 6)) === "000e0001000f")) {
                    $dialogTagHex .=  "[0x" .tagTo(bin2hex(substr($dialogBin, $offset, 8))). "]" ;
                    $offset += (8 - 2);
                } else {
                    $dialogTagHex .=  "[0x" .tagTo(bin2hex(substr($dialogBin, $offset, 10))). "]";
                    $offset += (10 - 2);
                }
            } elseif (bin2hex(substr($dialogBin, $offset, 2)) === "abab") {
                /* ignored */
            } elseif (bin2hex(substr($dialogBin, $offset, 2)) === "0000") {
                $dialogTagHex .=  "[0x" .tagTo("0000"). "]" ;
            } elseif (bin2hex(substr($dialogBin, $offset, 2)) === "03cd") {
                $dialogTagHex .=  "[0x" .tagTo("03cd"). "]" ;
            } elseif (bin2hex(substr($dialogBin, $offset, 2)) === "ffff") {
                $dialogTagHex .= "[0x" .tagTo("ffff") . "]" ;
            }else {
                $dialogTagHex .= utf16ToUtf8($dialogBin[$offset] . $dialogBin[$offset + 1]);
            }
        }

        return $dialogTagHex;
    }

    public static function dialogTagToDialogBin($dialogTagHex) {
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
                $temp = self::tagTo($temp,"hex");
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