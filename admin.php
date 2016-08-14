<?php require('includes/config.php');

//if not admin in redirect to home
if(!$_SESSION['username'] == 'admin'){ header('Location: index.php?nopermission'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	}

//define page title
$title = 'Admin - Gumbay';

//include header template
require('layout/header.php');
?>
<div class="container">
	<div class="row">
			<table class="table table-hover">
				<thead class="thead-inverse">
					<tr>
					  <th>Number</th>
					  <th>Title</th>
					  <th>Description</th>
					  <th>Price</th>
					  <th>Shipping</th>
					  <th>Member Number</th>
					  <th>Status</th>
					</tr>
				</thead>
					<?php
					$swag=mysqli_connect('localhost', 'root', 'password', 'db');
					$query = $swag->query("SELECT * FROM items");
					while($row = $query->fetch_array()){
						$message = ($row['active'] == "yes") ? "<tr>" : "<tr class=\"danger\">";
						echo $message;
						echo "<td>".$row['itemID']."</td>";
						echo "<td>".$row['itemTitle']."</td>";
						echo "<td>".$row['itemDescription']."</td>";
						echo "<td>$".$row['price']."</td>";
						echo "<td>$".$row['shippingPrice']."</td>";
						echo "<td>".$row['memberID']."</td>";
						$message = ($row['active'] == "yes") ? "<td><a href='items.php?item=".$row['itemID']."'>For sale!</a></td>" : "<td>Sold!</td>";
						echo $message;
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