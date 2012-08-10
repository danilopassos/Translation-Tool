<?php

require_once(dirname(__FILE__) .'/../model/mFormat.php');

class aFormat extends mFormat{
    
    protected static $sqlSelect = "SELECT * FROM `tt_format` WHERE project_id=1";

    protected static function initDicTagHex() {
        $o = new aFormat();
        $r = $o->runSelect(self::$sqlSelect);
        
        self::$dicTagHex = array();
        foreach ($r as $row) {
            self::$dicTagHex[$row['tag']] = $row['hex'];
        }
    }
    protected static function initDicTagHtml() {
        $o = new aFormat();
        $r = $o->runSelect(self::$sqlSelect);
        
        self::$dicTagHtml = array();
        foreach ($r as $row) {
            self::$dicTagHtml[$row['tag']] = $row['html'];
        }
    }
    
}

?>