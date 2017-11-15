<?php 
$conn_string = "host=ec2-204-236-239-225.compute-1.amazonaws.com port=5432 dbname=d6jhb3ivcsh25j user=hdaenmhigzqiil password=b4b3bc6e5f09fa4f305a424392cb5bd2e22b57f3a77ba0c45d75aad5d948b19f";
$dbconn4 = pg_connect($conn_string);
if(!$dbconn4){ 
	echo "Error : Unable to open database\n"; 
}
?>
