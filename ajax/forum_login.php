<?php
	// LOCAL TESTS
	if ($_SERVER['SERVER_ADDR'] == "127.0.0.1") {
		if (isset($_GET['s'])) {
			echo json_encode(array("success"=>true, "msg"=>"Login Successful", "user_id"=>25, "username"=>"|N|NjA|", "permission"=>"5", "is_registered"=>true));
			session_start("map");
			$_SESSION["user_id"] = "25";
			$_SESSION["permission_lvl"] = 5;
			//echo '[{"user_id":"25","username":"\u4e28n\u4e28nja\u4e28","is_registered":true}]';
		} else {
			$user_array[0]['user_id'] = 0;
			$user_array[0]['username'] = null;
			$user_array[0]['is_registered'] = false;	
			$user_array[0]['success'] = false;	
			$user_array[0]['permission'] = 0;	
			echo json_encode($user_array);
		}
	// LIVE SERVER
	} else {
		
		include('../class/mysql2json.class.php');

		include('../phpbb_path.php');
		include('../phpbb_setup.php');
		
		$user_array = array();
		$user_array[0] = array();
		$permission_lvl = 0;
		
		if (is_logged_in()) {
			$user_array[0]['user_id'] = $user->data['user_id'];
			$user_array[0]['username'] = $user->data['username_clean'];
			$user_array[0]['is_registered'] = $user->data['is_registered'];
			
			$query =  'select permission_lvl
						from ' . $db_prefix . 'permission
					   where user_id = ' . $user->data['user_id'];
			$result = @mysql_query($query) or die(mysql_error());
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$permission_lvl = $row["permission_lvl"];
			}
			$user_array[0]['permission'] = $permission_lvl;
					
	//		echo json_encode(array("success"=>true, "msg"=>"Login Successful", "user_id"=>$user->data['user_id'], "username"=>$user->data['username_clean'], "is_registered"=>$user->data['is_registered']));
		} else {
			$username = request_var('username', '', true);
			$password = request_var('password', '', true);
		
			$result = $auth->login($username, $password);
		
			if ($result['status'] == LOGIN_SUCCESS) {
				$user_array[0]['user_id'] = $user->data['user_id'];
				$user_array[0]['username'] = $user->data['username_clean'];
				$user_array[0]['is_registered'] = $user->data['is_registered'];

	//			echo json_encode(array("success"=>true, "msg"=>"Login Successful", "user_id"=>$user->data['user_id'], "username"=>$user->data['username_clean'], "is_registered"=>$user->data['is_registered']));
			} else {
				$user_array[0]['user_id'] = $user->data['user_id'];
				$user_array[0]['username'] = $user->data['username_clean'];
				$user_array[0]['is_registered'] = $user->data['is_registered'];
				
	//			echo json_encode(array("success"=>false, "msg"=>"Login/Senha Inválido(s)", "user_id"=>$user->data['user_id'], "username"=>$user->data['username_clean'], "is_registered"=>$user->data['is_registered']));		
			}
			
			$query =  'select permission_lvl
						from ' . $db_prefix . 'permission
					   where user_id = ' . $user->data['user_id'];
			$result = @mysql_query($query) or die(mysql_error());
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$permission_lvl = $row["permission_lvl"];
			}	
			$user_array[0]['permission'] = $permission_lvl;
		}
		
		if (isset($_GET['s'])) {
			$user_array = $user_array[0];
			$user_array['success'] = $user_array['is_registered'];
		}
		echo json_encode($user_array);
		
		$user_id = $user->data['user_id'];
		session_start("translation");
		$_SESSION["user_id"] = $user_id;
		$_SESSION["permission_lvl"] = $permission_lvl;
    }
?>
