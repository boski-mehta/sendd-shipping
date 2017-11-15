<?php
session_start();
require __DIR__.'/connection.php'; //DB connectivity
$path = "images/";
$valid_file_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(is_array($_FILES)) {
	print_r($_FILES);
	$shop_url=$_REQUEST['shop_url'];
$name = $_FILES['fileToUpload']['name'];
$size = $_FILES['fileToUpload']['size'];
if(strlen($name)) {
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_file_formats)) {
if($size<(1024*1024)) {
$image_name = time().$session_id.".".$ext;
$tmp = $_FILES['fileToUpload']['tmp_name'];
/*if(move_uploaded_file($tmp, $path.$image_name)){
	 $user_exist = pg_query($dbconn4, "SELECT * FROM user_table WHERE store_url = '{$shop_url}'");
		if(pg_num_rows($user_exist)){
			$user_exist = pg_query($dbconn4, "UPDATE user_table SET  logo=''$image_name''  WHERE store_url = '{$shop_url}'");
				if($user_exist){
					echo "Logo uploaded sucessfully";
					
				}
		}
		else {
			$sql = "insert into user_table (logo) values ('$image_name')";
			$qry = pg_query($sql);
			if($qry){
				echo "Logo uploaded sucessfully";
			}
    echo "<img src='images/".$image_name."' class='preview'>";
}
else
echo "Image Upload failed";
} */
else
echo "Image file size maximum 1 MB";
}
else
echo "Invalid file format";
}
else
echo "Please select image";
exit;
}
}
?>
