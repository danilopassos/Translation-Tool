<?php
	include('../config.php');
    include('../class/mysql2json.class.php');
	
	$query = "SET SESSION group_concat_max_len = 4294967295";
	$result = @mysql_query($query);
	
	$section_id = $_GET['s'];
	
    $query = 'select d.dialog_id				id
                   , d.name 					name
                   , min(dl.dialog_status_id)	status
				   , dl.last_updated				last_updated
				from ' . DB_PREFIX . 'dialog d
				left join ' . DB_PREFIX . 'dialog_lang dl
				  on d.dialog_id = dl.dialog_id
			   where d.section_id = ' . $section_id . '
			   group by 1,2,4
			   order by d.dialog_id';

    $result = @mysql_query($query) or die(mysql_error());

	$res = array();
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$res[] = $row;
	}
    $mysql2json = new mysql2json();
    
    //$num = mysql_affected_rows();
    echo json_encode($res);
	
	
?>
