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
	
	$rev = false;
	if (isset($_POST['rev'])) {
		$rev = true;
	}
	
	$dialogLangId = mysql_real_escape_string($_POST['dlid']);
	$dialogLangText = mysql_real_escape_string($_POST['txt']);
	
	if ($_SESSION['permission_lvl'] < 5
		|| ($_SESSION['permission_lvl'] == 5 && $statusId > 3)) {
		echo json_encode(array("success"=>false, "msg"=>"No permission!"));
		exit();
	}
		
    $query = 'update ' . $db_prefix . 'dialog_lang 
	             set dialog = \'' . $dialogLangText . '\'
				   , user_id = \'' . $_POST['uid'] . '\'
				   , last_updated = now()
				   
			 ';
	if ($rev) {
	$query .= '   , dialog_status_id = 2';
	}
	$query .= '
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
