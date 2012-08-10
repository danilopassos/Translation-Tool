<?php
require_once(dirname(__FILE__) .'/../db/dbConnection.php');
require_once(dirname(__FILE__) .'/../core/util.php');

abstract class mFormat extends dbConnection {
    protected static  $dicTagHex = null;
    protected static  $dicTagHtml = null;        
}
?>
