<?php
	include('../config.php');
    include('../class/mysql2json.class.php');
	
	$query = "SET SESSION group_concat_max_len = 4294967295";
	$result = @mysql_query($query);
	
	$section_id = $_GET['s'];
	
	//$query = '
	$query = 'select * from (
    
			  select d.dialog_id				id
                   , d.name 					name
				   , dl.dialog					dialog_br
				   , dl2.dialog					dialog_en
				   , u.username					username
                   , dl.dialog_status_id	status
				   , dl.last_updated		last_updated
				from ' . $db_prefix . 'dialog d
				left join ' . $db_prefix . 'dialog_lang dl
				  on d.dialog_id = dl.dialog_id
				left join ' . $db_prefix . 'dialog_lang dl2
				  on dl.dialog_id = dl2.dialog_id
				 and dl2.lang_id = 1 
				   , ' . $forum_prefix . 'users u
				   , ' . $db_prefix . 'lang l
			   where d.section_id = ' . $section_id . '
				 and u.user_id = dl.user_id
				 and dl.lang_id = l.lang_id
				 and dl.lang_id = 7
			   order by d.dialog_id, dl.last_updated desc, dl.dialog_status_id, l.position, d.position
			       ) a
			   group by 1,2';
			   //order by l.position, d.position, dl.last_updated';
			
	//echo $query;

    $result = @mysql_query($query) or die(mysql_error());

	$res = array();
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$res[] = $row;
	}
    $mysql2json = new mysql2json();
    
    //$num = mysql_affected_rows();
    echo json_encode($res);
	
	
?>
