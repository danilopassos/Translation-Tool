<?php
	include('../config.php');
    include('../class/mysql2json.class.php');
	
	$query = "SET SESSION group_concat_max_len = 4294967295";
	$result = @mysql_query($query);
	
	$projectId = mysql_real_escape_string($_REQUEST['pId']);
//	$toolboxId = mysql_real_escape_string($_POST['tId']);
	
    $query = 'select d.dialog_id
	               , d.name as dialog_name
	               , dh.user_id
				   , u.username
				   , dh.changed
				   , dh.last_updated
				   , ds.dialog_status_name
				from ' . $db_prefix . 'dialog_hist dh
				   , ' . $forum_prefix . 'users u
				   , ' . $db_prefix . 'dialog_lang dl
				   , ' . $db_prefix . 'dialog d
				   , ' . $db_prefix . 'section s
				   , ' . $db_prefix . 'dialog_status ds
			   where dl.user_id = u.user_id
				 and dl.dialog_lang_id = dh.dialog_lang_id
			     and dl.dialog_id = d.dialog_id
				 and d.section_id = s.section_id
			     and s.project_id = ' . $projectId . '
				 and changed <> \'F\'
				 and dh.dialog_status = ds.dialog_status_id
			   ORDER BY dh.last_updated desc
			   limit 0, 30';
//				echo $query;

    $result = @mysql_query($query) or die(mysql_error());

	$res = array();
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$res[] = $row;
	}
    $mysql2json = new mysql2json();
    
    //$num = mysql_affected_rows();
    echo json_encode($res);
	
	
?>
