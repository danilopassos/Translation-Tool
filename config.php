<?php

    const DB_USER = "root";
    const DB_PASS = "";
    const DB_HOST = "localhost";
    const DB_DATABASE = "ZeldaSS_Translate_Tool";
    const DB_PREFIX = "tt_";
    
    $connection = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Problemas de conexção com o banco.');
    mysql_select_db (DB_DATABASE, $connection) or die('Problemas de conexção com o banco.');
	/*
    mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');
	*/
	function begin() {
		@mysql_query("BEGIN");
	}
	
	function commit() {
		@mysql_query("COMMIT");
	}
	
	function rollback()	{
		@mysql_query("ROLLBACK");
	}		

?>
