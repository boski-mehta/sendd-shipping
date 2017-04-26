<?php session_start();
	
	require('db_con.php');

	$username 	= mysql_real_escape_string($_POST['username']);
	if($username != ''){
		$sql = "select email from user_table where username = '$username'";
		$qry = mysql_query($sql);

		$numrows  = mysql_num_rows($qry);

		if($numrows > 0){
			echo "bad";
		}
	}
?>