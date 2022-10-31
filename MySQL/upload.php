<?php require "xuly.php"?>
<!DOCTYPE html> 
<html> 
<head> 
<title>Image Upload</title> 
<link rel="stylesheet" href="style.css"> 
</head> 
<body> 
<div id="content"> 
<form method="POST" action="upload.php" enctype="multipart/form-data"> 
<input type="file" name="image"> 
<button type="submit" name="upload">POST</button>
</form> 
</div> 
</body> 
</html>