<?php 
session_start();
require __DIR__.'/connection.php'; //DB connectivity
	
	 $email= $_POST['email'];
	 $password= $_POST['password'];
    	$shop_url = $_POST['shop_url'];
	//convert string to md5
	//$password 	= md5($password);
	//$shop_url = $_SESSION['shop'];
	$user_exist = pg_query($dbconn4, "SELECT * FROM user_table WHERE store_url = '{$shop_url}' and  email = '{$email}' and password = '{$password}'");
	
if(pg_num_rows($user_exist)){
while($response = pg_fetch_assoc($user_exist)){
$_SESSION['email'] =  $email;
	echo "cool";
	pg_query($dbconn4, "UPDATE user_table SET status = '1' WHERE store_url = '{$shop_url}' and  email = '{$email}' and password = '{$password}'");

}
}
?>
