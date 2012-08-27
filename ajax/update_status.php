<?php
    include('../config.php');
    include('../class/mysql2json.class.php');
	
	session_start("translation");	
	begin();
	
	if ($_SESSION['user_id'] != $_POST['uid']) {
		echo json_encode(array("success"=>false, "msg"=>"N&#227;o funcionar&#225;!"));
		exit();	
	}
	if (!is_numeric($_POST['dlid']) && !is_numeric($_POST['sid'])) {
		echo json_encode(array("success"=>false, "msg"=>"N&#227;o funcionar&#225;!"));
		exit();
	}
	$dialogLangId = mysql_real_escape_string($_POST['dlid']);
	$statusId = mysql_real_escape_string($_POST['sid']);
	
	if ($_SESSION['permission_lvl'] < 5
		|| ($_SESSION['permission_lvl'] == 5 && $statusId > 3)) {
		echo json_encode(array("success"=>false, "msg"=>"No permission!"));
		exit();
	}
	
	
    $query = 'update ' . $db_prefix . 'dialog_lang 
	             set dialog_status_id = ' . $statusId . '
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
