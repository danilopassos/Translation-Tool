<?php
	include('../config.php');
    include('../class/mysql2json.class.php');
	
	$query = "SET SESSION group_concat_max_len = 4294967295";
	$result = @mysql_query($query);
	
	$projectId = mysql_real_escape_string($_POST['pId']);
//	$toolboxId = mysql_real_escape_string($_POST['tId']);
	
    $query = 'select 0 as toolbox_id
	               , \'All Names\' as toolbox_name
			   UNION ALL	   
			  select t.toolbox_id
	               , t.toolbox_name
				from ' . $db_prefix . 'toolbox t
				   , ' . $db_prefix . 'project_has_' . $db_prefix . 'toolbox tt
			   where t.toolbox_id = tt.toolbox_id
			     and tt.project_id = ' . $projectId;

    $result = @mysql_query($query) or die(mysql_error());

	$res = array();
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$res[] = $row;
	}
    $mysql2json = new mysql2json();
    
    //$num = mysql_affected_rows();
    echo json_encode($res);
	
	
?>
