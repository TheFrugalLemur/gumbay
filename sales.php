<?php require('includes/config.php');

//define page title
$title = 'Sales - Gumbay';

//include header template
require('layout/header.php');
?>

<?php 

if ($user->is_logged_in()==false) {
	header('Location: login.php?notloggedin');
}

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
	echo $sql;
	
	$result = mysqli_query($conn, $sql);
	
	if(!$result)
	{
		die("<p>Could not enter data: ".mysql_error()."</p>");
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
<form class="form-horizontal" method="post">
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
      <input id="itemPrice" name="itemPrice" class="form-control" placeholder="10.00" type="text" required="">
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
      <input id="itemShipping" name="itemShipping" class="form-control" placeholder="2.50" type="text" required="">
    </div>
    <p class="help-block">Use only digits</p>
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
