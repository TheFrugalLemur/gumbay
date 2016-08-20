<?php require('includes/config.php');

//define page title
$title = 'All Users - Gumbay';
$page = 'allusers';
$loginneeded = true;
$permissionrequired = true;
$loginforbidden = false;

//include header template
require('layout/header.php');
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<table class="table">
				<?php
				$swag=mysqli_connect('localhost', 'root', 'password', 'db');
				$query = $swag->query("SELECT * FROM members");
				while($row = $query->fetch_array()){
					echo "<tr>";
					echo "<td>".$row['username']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "</tr>";
				}
				?>
			</table>
		</div>
	</div>
</div>
<?php
//include footer template
require('layout/footer.php');
?>