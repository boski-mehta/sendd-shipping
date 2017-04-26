<?php 
	
	require('db_con.php');
	
	$email 		= mysql_real_escape_string($_POST['email']);
	$password	= mysql_real_escape_string($_POST['password']);
	
	//convert password to md5 for security
	$password 	= md5($password);
	
	$sql = "insert into user_table (email, password) values ('$email', '$password')";
	$qry = mysql_query($sql);

	if($qry){
		echo "done";
	}
	
?>