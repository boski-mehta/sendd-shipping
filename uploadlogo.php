<?php
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
$sourcePath = $_FILES['fileToUpload']['tmp_name'];
$targetPath = "images/".$_FILES['fileToUpload']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<img class="image-preview" src="<?php echo $targetPath; ?>" class="upload-preview" />
<?php
}
}
}
?>
