<?php require('includes/config.php');

//define page title
$title = 'Request - Gumbay';
$page = 'request';
$loginneeded = true;
$permissionrequired = false;
$loginforbidden = false;

//include header template
require('layout/header.php');
?>
<?php 
//if form has been submitted process it
if(isset($_POST['submit'])){
	$sql = "UPDATE profiles SET request = '1' WHERE memberID='".$_SESSION['memberID']."'";
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'password';
	
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass);
	mysqli_select_db($conn, 'db'); 
	
	if(!$conn)
	{
		die('<p>Could not connect: '.mysqli_connect_error($conn).'</p>');
	}
	
	$result = mysqli_query($conn, $sql);
	
	header('Location: index.php?action=request&status=success');
	
}

//define page title
$title = 'Transactions - Gumbay';

//include header template
require('layout/header.php');
?>
<div class="container">
	<div class="row">
		<center>
			<h1>Are you sure you wish to request a balance reset?</h1>
			<form method="post">
			<style> button {width=45%;} </style>
				<button id="submit" value="yes"name="submit" class="btn btn-success btn-lg">Yes</button>	
			</form>
		</center>
	</div>
</div>
<?php
//include footer template
require('layout/footer.php');
?>