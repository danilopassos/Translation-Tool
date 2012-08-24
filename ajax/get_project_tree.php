<?php

    //----------------------------------------------------------//
	include('../config.php');
    include('../class/mysql2json.class.php');

    $arr_treeview = array();

	$project = $_GET["p"];
	
    $query = 'select *
			    from ' . $db_prefix . 'section
			   where parent_id is null
			     and project_id = ' . $project . '
				 and visible = 1
			   order by section_id
			  ';
			   
    $result = @mysql_query($query) or die(mysql_error());

    while ($row = mysql_fetch_array($result)) {
        $arr_child = array();
        $node['text'] = $row['section_name'];
//		$node['iconCls'] = 'icnMrkr icnMrkr' . $row['section_id'];
//		$node['collapsedCls'] = $node['iconCls'];
//      $node['checked'] = $row['default_checked'] == 1 ? true : false;
//		$node['expanded'] = true;
		
		$node['id'] = $row['section_id'];

		$query = 'select *
					from ' . $db_prefix . 'section
				   where parent_id = ' . $row['section_id'] . '
					 and project_id = ' . $project . '
					 and visible = 1
				   order by section_id				   
				  ';
					 
        $result2 = mysql_query($query);
        if($result2){
            while ($row2 = mysql_fetch_array($result2)) {
                $children['text'] = $row2['section_name'];
                $children['id'] = $row2['section_id'];
                $children['leaf'] = true;
//				$children['checked'] = $row2['default_checked'] == 1 ? true : false;
//				$children['iconCls'] = "icnMrkr icnMrkr" . $row2['marker_category_id'];
//				$children['collapsedCls'] = $children['iconCls'];
                array_push($arr_child, $children);
            }
            $node['children'] = $arr_child;
        }
        array_push($arr_treeview, $node);
    }


    $mysql2json = new mysql2json();
    
    echo json_encode($arr_treeview);
?>
