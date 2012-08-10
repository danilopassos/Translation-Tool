<?php
require_once(dirname(__FILE__) .'/../actions/aFormat.php');

class Format extends aFormat{
    public static function getTagToHex($tag){
        if(self::$dicTagHex == null){
            self::initDicTagHex();
            self::getTagToHex($tag);
        }else{
            if(isset(self::$dicTagHex[$tag])){
                return self::$dicTagHex[$tag];
            }else{
                die ("tag $tag não emcontrada");
            }
        }
    }
    
    public static function getTagToHtml($tag){
        if(self::$dicTagHtml == null){
            self::initDicTagHtml();
            self::getTagToHtml($tag);
        }else{
            if(isset(self::$dicTagHtml[$tag])){
                return self::$dicTagHtml[$tag];
            }else{
                return null;
            }
        }
    }    
}
?>
