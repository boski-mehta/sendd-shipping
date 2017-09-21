<?php 
session_start();
require __DIR__.'/connection.php'; //DB connectivity
	
  if((isset($_REQUEST['id'])) || $_REQUEST['id']!=''){
	 $shop_url = $_REQUEST['shop_url'];
   	 $id=$_REQUEST['id'];
	 $delete_address = pg_query($dbconn4,"DELETE FROM pickup_address WHERE shop_url='{$shop_url}' and id ={$id}");
 	 echo "delete successfully";
	  
  }
  ?>
