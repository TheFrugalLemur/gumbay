<?php require('includes/config.php');

//define page title
$title = 'Create Sales - Gumbay';
$page = 'createsale';
$loginneeded = true;
$permissionrequired = false;
$loginforbidden = false;

//include header template
require('layout/header.php');
?>


<?php 

if (isset($_POST['submit'])) {
	$itemTitle = htmlspecialchars($_POST['itemTitle']);
	$itemTitle = htmlspecialchars($_POST['itemTitle'], ENT_QUOTES);
	$itemDescription = htmlspecialchars($_POST['itemDesc']);
	$itemDescription = htmlspecialchars($_POST['itemDesc'], ENT_QUOTES);
	$itemPrice = htmlspecialchars($_POST['itemPrice']);
	$itemPrice = htmlspecialchars($_POST['itemPrice'], ENT_QUOTES);
	$itemShipping = htmlspecialchars($_POST['itemShipping']);
	$itemShipping = htmlspecialchars($_POST['itemShipping'], ENT_QUOTES);
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'password';
	
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass);
	mysqli_select_db($conn, 'db'); 
	
	if(!$conn)
	{
		die('<p>Could not connect: '.mysqli_connect_error($conn).'</p>');
	}
	
	$sql = "INSERT INTO items (itemTitle, itemDescription, price, shippingPrice, memberID) VALUES ('$itemTitle', '$itemDescription', '$itemPrice', '$itemShipping', ".$_SESSION['memberID'].")";
	$sql2 = "SELECT itemID FROM items WHERE itemID = (SELECT MAX(itemID) FROM items)";
	
	$result = mysqli_query($conn, $sql);
	$result2 = mysqli_query($conn, $sql2);
	
	if(!$result)
	{
		die("<p>Could not enter data: ".mysql_error()."</p>");
	}
	if(!$result2)
	{
		die("<p>Could not enter data: ".mysql_error()."</p>");
	}
	while($row = $result2->fetch_array()){
		$itemID = $row['itemID'];
		echo $itemID;
	}
	
	####################################################################################################
	#
	#
	#	
		$target_dir = "";
		$target_file = "21". basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$target_file = "images/items/".$itemID;
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				$success = true;
			} else {
				echo "Sorry, there was an error uploading your file.";
				$success = false;
			}
		}	
	#
	#
	#
	####################################################################################################
	header('location:allsales.php?action=success&itemID='.$itemID.'&imageSuccess='.$success);
}

}
?>

<style>
textarea {
    max-width: 100%; 
	max-height: 400px;
}
body {
	padding-left: 15px;
	padding-right: 15px;
}
</style>
<form class="form-horizontal" method="post" enctype="multipart/form-data">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="itemTitle">Title</label>  
  <div class="col-md-4">
  <input id="itemTitle" name="itemTitle" type="text" placeholder="a general description of the item" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="itemDesc">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="itemDesc" name="itemDesc">Hi, up for sale is...</textarea>
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="itemPrice">Price</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">$</span>
      <input id="itemPrice" name="itemPrice" class="form-control" placeholder="10.00" min="0.01" type="number" step="0.01" required="">
    </div>
    <p class="help-block">Use only digits</p>
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="itemShipping">Shipping</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">$</span>
      <input id="itemShipping" name="itemShipping" class="form-control" placeholder="2.50" min="0.01" type="number" step="0.01"  required="">
    </div>
    <p class="help-block">Use only digits</p>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="fileToUpload">Image</label>
  <div class="col-md-4">
    <center><input id="fileToUpload" name="fileToUpload" class="input-file" type="file"></center>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
  </div>
</div>

</fieldset>
</form>
