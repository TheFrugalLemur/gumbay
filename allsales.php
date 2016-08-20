<?php require('includes/config.php');

//define page title
$title = 'Sales - Gumbay';
$page = 'allsales';
$loginneeded = false;
$permissionrequired = false;
$loginforbidden = false;

//include header template
require('layout/header.php');
?>

<div class="container">
	<div class="row">
	<?php
	if (isset($_GET['mode'])){
		$message = ($_GET['mode'] == "showall") ? "<a href=\"allsales.php?mode=showforsale\" data-toggle=\"tooltip\" type=\"button\" class=\"btn btn-success btn-lg btn-block\">Show For Sale</a>" : "<a href=\"allsales.php?mode=showall\" data-toggle=\"tooltip\" type=\"button\" class=\"btn btn-success btn-lg btn-block\">Show All</a>";
	}else{
		$message = "<a href=\"allsales.php?mode=showforsale\" data-toggle=\"tooltip\" type=\"button\" class=\"btn btn-success btn-lg btn-block\">Show For Sale</a>";
	}
	echo $message;
	?>
			<table class="sortable table table-hover" style="margin-bottom: 70px;" >
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
					if (isset($_GET['mode']) && $_GET['mode'] == "showall"){
						$query = $swag->query("SELECT * FROM items");
						while($row = $query->fetch_array()){
							if ($row['active'] !== "yes"){ 
								echo "<tr class=\"danger\">";
							}elseif(isset($_GET['itemID'])){
								if($row['itemID']==$_GET['itemID']){
								echo "<tr class=\"success\">";
								}
							}else{
								echo "<tr>";
							}
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
					}elseif (isset($_GET['mode']) && $_GET['mode'] == "showforsale"){
						$query = $swag->query("SELECT * FROM items WHERE active = 'yes'");
						while($row = $query->fetch_array()){
							echo "<tr>";
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
					}else {
							$query = $swag->query("SELECT * FROM items");
						while($row = $query->fetch_array()){
							if ($row['active'] !== "yes"){ 
								echo "<tr class=\"danger\">";
							}elseif(isset($_GET['itemID'])){
								if($row['itemID']==$_GET['itemID']){
								echo "<tr class=\"success\">";
								}
							}else{
								echo "<tr>";
							}
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
					}
					?>
			</table>
	</div>
</div>
<?php
//include footer template
require('layout/footer.php');
?>