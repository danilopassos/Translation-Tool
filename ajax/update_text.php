<?php
	include('../config.php');
    include('../class/mysql2json.class.php');

	session_start("translation");	
	begin();
	
	if ($_SESSION['user_id'] != $_POST['uid']) {
		echo json_encode(array("success"=>false, "msg"=>"N&#227;o funcionar&#225;!"));
		exit();	
	}
	if (!is_numeric($_POST['dlid'])) {
		echo json_encode(array("success"=>false, "msg"=>"N&#227;o funcionar&#225;!"));
		exit();
	}
	
	$dialogLangId = mysql_real_escape_string($_POST['dlid']);
	$dialogLangText = mysql_real_escape_string($_POST['txt']);
	
    $query = 'update ' . DB_PREFIX . 'dialog_lang 
	             set dialog = \'' . $dialogLangText . '\'
				   , user_id = \'' . $_POST['uid'] . '\'
				   , last_updated = now()
			   where dialog_lang_id = ' . $dialogLangId;

    $result = @mysql_query($query) or die(mysql_error());
	if ($result) {
		echo json_encode(array("success"=>true, "msg"=>"Status Updated!"));
		commit();
	} else {
		echo json_encode(array("success"=>false, "msg"=>mysql_error()));
		rollback();
	}
	
?>
