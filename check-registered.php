<?php 
	
	
	
	$email 		= mysql_real_escape_string($_POST['email']);
	$username 	= mysql_real_escape_string($_POST['username']);
	
	if($email != ''){
		$sql = "select email from user_table where email = '$email'";
		$qry = mysql_query($sql);

		$numrows  = mysql_num_rows($qry);

		if($numrows > 0){
			//print message for jquery
			echo "<p style='color:red'>Email is registered already!!</p>";
		}else{
			echo "<p style='color:green'>Good! New Email address!!</p>";
		}
	}
	
	if($username != ''){
		$sql = "select email from user_table where username = '$username'";
		$qry = mysql_query($sql);

		$numrows  = mysql_num_rows($qry);

		if($numrows > 0){
			echo "<p style='color:red'>Username not available!!</p>";			
		}else{
			echo "<p style='color:green'>Username available!</p>";
		}
	}
	

?>
