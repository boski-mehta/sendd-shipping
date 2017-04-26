<?php 
	
	
	
	$email 		= mysql_real_escape_string($_POST['email']);
	
	$sql = "select email from user_table where email = '$email'";
	$qry = mysql_query($sql);

	$numrows  = mysql_num_rows($qry);

	if($numrows > 0){
		echo "bad";
	}
	
?>
