<?php
	include('../config.php');
    include('../class/mysql2json.class.php');
	
	$query = "SET SESSION group_concat_max_len = 4294967295";
	$result = @mysql_query($query);
	
	$projectId = mysql_real_escape_string($_REQUEST['pId']);
	$toolboxId = mysql_real_escape_string($_REQUEST['tId']);
	
    $query = 'select english
				   , portuguese
				   , japanese
				   , spanish
				   , italian
				   , deutch
				   , french
				from ' . $db_prefix . 'toolbox_term tt ';
	if ($toolboxId > "0") {
		$query .= '
			  where toolbox_id = ' . $toolboxId;
	} else {
		$query .= '
                   , ' . $db_prefix . 'project_has_' . $db_prefix . 'toolbox tp
			   where tp.toolbox_id = tt.toolbox_id
			     and tp.project_id = ' . $projectId;	 
	}
	$query .= ' order by english';
//	echo $query;

    $result = @mysql_query($query) or die(mysql_error());

	$res = array();
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$res[] = $row;
	}
    $mysql2json = new mysql2json();
    
    //$num = mysql_affected_rows();
    echo json_encode($res);
	
	
?>
