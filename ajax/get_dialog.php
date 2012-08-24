<?php

include('../config.php');
include('../class/mysql2json.class.php');

$query = "SET SESSION group_concat_max_len = 4294967295";
$result = @mysql_query($query);

$dialog_id = $_GET['id'];
//$project_id = $_GET['pId'];

$query = 'select      dl.dialog_lang_id     id
                    , dl.lang_id            lang
                    , l.lang_name           lang_name
                    , dl.dialog_status_id   status
					, s.dialog_status_name	status_name
                    , dl.dialog   			dialog
                    , dl.version            version
                    , dl.last_updated       last_updated
				from ' . $db_prefix . 'dialog_lang dl
				   , ' . $db_prefix . 'lang l
				   , ' . $db_prefix . 'dialog_status s
			   where dl.dialog_id = ' . $dialog_id . '
			     and l.lang_id = dl.lang_id
				 and s.dialog_status_id = dl.dialog_status_id
			   order by dl.dialog_status_id, dl.lang_id, dl.dialog_lang_id desc';

$result = @mysql_query($query) or die(mysql_error());

$res = array();
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
#    $row["dialog"] = $row["dialog"];
    $res[] = $row;
}
$mysql2json = new mysql2json();

//$num = mysql_affected_rows();
echo json_encode($res);
?>
