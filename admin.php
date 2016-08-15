<?php require('includes/config.php');

//if not admin in redirect to home
if($_SESSION['username'] !== 'admin'){ header('Location: index.php?nopermission'); }

//if form has been submitted process it
if(isset($_POST['submit-yes'])){
	$sql = "UPDATE profiles SET request = '0', balance = '0' WHERE memberID='".$_POST['memberID']."'";
	
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
	
	header('Location: index.php?request');
}elseif (isset($_POST['submit-no'])){
	$sql = "UPDATE profiles SET request = '0' WHERE memberID='".$_POST['memberID']."'";

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
	
	header('Location: index.php?request');
}


//define page title
$title = 'Admin - Gumbay';

//include header template
require('layout/header.php');
?>
<div class="container">
  <div class="row">
    <div class="col-sm-5">
	<center>
			<table class="table table-hover">
				<thead class="thead-inverse">
					<tr>
					  <th>Member Number</th>
					  <th>Fullname</th>
					  <th>Balance</th>
					  <th>Approve</th>
					  <th>Deny</th>
					</tr>
				</thead>
					<?php
					$swag=mysqli_connect('localhost', 'root', 'password', 'db');
					$query = $swag->query("SELECT * FROM profiles WHERE request = 1");
					while($row = $query->fetch_array()){
						echo "<tr>";
						echo "<td>".$row['memberID']."</td>";
						echo "<td>".$row['fullname']."</td>";
						echo "<td>$".$row['balance']."</td>";
						echo "<form method=\"post\">";
						echo "<input type=\"hidden\" name=\"memberID\" value=".$row['memberID'].">";
						echo "<td><button id=\"submit\" value=\"approve\" name=\"submit-yes\" class=\"btn btn-success btn-sm\">Approve</button></td>";
						echo "<td><button id=\"submit\" value=\"deny\" name=\"submit-no\" class=\"btn btn-warning btn-sm\">Deny</button></td>";
						echo "<form>";
						echo "</tr>";
					}
					?>
			</table>
	</div>
</div>
<?php
//include footer template
require('layout/footer.php');
?>